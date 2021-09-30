<?php


namespace App\Ui\Api\V1;

use App\DTO\EditEntityDTO;
use App\DTO\GetEntityByIdDTO;
use App\DTO\PaginatorDTO;
use App\DTO\RemoveEntityByIdDTO;
use App\Entity\Application;
use App\Service\Application\Actions\CreateAppAction;
use App\Service\Application\Actions\EditAppAction;
use App\Service\Application\Actions\GetAllAppAction;
use App\Service\Application\Actions\GetAppByIdAction;
use App\Service\Application\Actions\RemoveAppAction;
use App\Service\Application\Dto\CreateAppDTO;
use App\Ui\Api\V1\Constraints\Application\CreateOrUpdateAppConstrain;
use App\Ui\Api\V1\Constraints\Client\CreateOrUpdateClientConstraint;
use App\Ui\Api\V1\Resourse\Application\AppResource;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Controller used to manage applications
 *
 * @Route("/api/v1/apps")
 *
 */
class AppController extends AbstractController
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator) {
        $this->validator = $validator;
    }

    /**
     * @Route("/create", methods="POST", name="app_create")
     * @throws \Exception
     */
    public function create(Request $request, CreateAppAction $createAppAction): JsonResponse {
        $fails = $this->validator->validate($request->toArray(), CreateOrUpdateAppConstrain::list());

        if ($fails->count() > 0) {
            $messages = [];
            foreach ($fails as $fail) {
                $messages[] = $fail->getMessage();
            }

            return new JsonResponse([
                'error'    => 'validate',
                'messages' => json_encode($messages)
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $dto = new CreateAppDTO(
            $request->get('client_id'),
            $request->get('term'),
            $request->get('amount'),
            $request->get('currency')
        );

        $result = $createAppAction->run($dto);

        if (!$result) {
            return new JsonResponse([
                'error' => 'not created an app',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id<\d+>}", methods="get", name="app_find")
     * @throws \Exception
     */
    public function find(int $id, GetAppByIdAction $getAppByIdAction): JsonResponse {
        $dto = new GetEntityByIdDTO($id);

        $app = $getAppByIdAction->run($dto);

        if (!$app) {
            return new JsonResponse([
                'error' => 'not found app',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json((new AppResource($app))->toArray());
    }

    /**
     * @Route("/{id<\d+>}", methods="delete", name="app_delete")
     * @throws \Exception
     */
    public function remove(int $id, RemoveAppAction $removeAppAction): JsonResponse {
        $dto = new RemoveEntityByIdDTO($id);

        $result = $removeAppAction->run($dto);

        if (!$result) {
            return new JsonResponse([
                'error' => 'not found entity',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json(['success' => true]);
    }

    /**
     * @Route("/", methods="get", name="apps_list")
     * @throws \Exception
     */
    public function list(Request $request, GetAllAppAction $getAllAppAction): JsonResponse {
        $query = $request->query->get('q', 1);
        $limit = $request->query->get('l', 10);

        $dto = new PaginatorDTO($query, $limit);

        $results = $getAllAppAction->run($dto);

        if (!$results) {
            return new JsonResponse([
                'error' => 'not found entities',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results['items'] = array_map(function (Application $app) {
            return (new AppResource($app))->toArray();
        }, $results['items']);

        return $this->json($results);
    }

    /**
     * @Route("/{id<\d+>}", methods="put", name="app_edit")
     * @throws \Exception
     */
    public function edit(int $id, Request $request, EditAppAction $editAppAction): JsonResponse {
        $dto = new EditEntityDTO($id, $request->toArray());

        $app = $editAppAction->run($dto);

        if (!$app) {
            return new JsonResponse([
                'error' => 'not found entity',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json((new AppResource($app))->toArray());
    }
}