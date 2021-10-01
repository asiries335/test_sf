<?php


namespace App\Ui\Api\V1;

use App\DTO\EditEntityDTO;
use App\DTO\GetEntityByIdDTO;
use App\DTO\PaginatorDTO;
use App\DTO\RemoveEntityByIdDTO;
use App\Entity\Client;
use App\Service\Client\Actions\CreateClientAction;
use App\Service\Client\Actions\EditClientAction;
use App\Service\Client\Actions\GetAllClientAction;
use App\Service\Client\Actions\GetClientByIdAction;
use App\Service\Client\Actions\RemoveClientAction;
use App\Service\Client\Dto\CreateClientDTO;
use App\Ui\Api\V1\Constraints\Client\CreateOrUpdateClientConstraint;
use App\Ui\Api\V1\Resourse\Client\ClientResource;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controller used to manage clients
 *
 * @Route("/api/v1/clients")
 *
 */
class ClientController extends BaseApiController
{
    /**
     * @Route("/create", methods="POST", name="client_create")
     * @throws \Exception
     */
    public function create(Request $request, CreateClientAction $createClientAction): JsonResponse {
        $this->validate($request, new CreateOrUpdateClientConstraint());

        $dto = new CreateClientDTO(
            $request->get('firstName'),
            $request->get('lastName'),
            $request->get('email'),
            $request->get('phoneNumber')
        );

        try {
            $client = $createClientAction->run($dto);
        } catch (\Exception $exception) {
            return new JsonResponse([
                'error'   => 'not created a client',
                'message' => $exception->getMessage()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json((new ClientResource($client))->toArray(), Response::HTTP_CREATED);
    }

    /**
     * @Route("/{id<\d+>}", methods="get", name="client_find")
     * @throws \Exception
     */
    public function find(int $id, GetClientByIdAction $getClientByIdAction): JsonResponse {
        $dto = new GetEntityByIdDTO($id);

        $client = $getClientByIdAction->run($dto);

        if (!$client) {
            return new JsonResponse([
                'error' => 'not found entity',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $resource = new ClientResource($client);

        return $this->json($resource->toArray());
    }

    /**
     * @Route("/", methods="get", name="client_list")
     * @throws \Exception
     */
    public function list(Request $request, GetAllClientAction $getAllClientAction): JsonResponse {
        $query = $request->query->get('q', 1);
        $limit = $request->query->get('l', 10);

        $dto = new PaginatorDTO($query, $limit);

        $results = $getAllClientAction->run($dto);

        if (!$results) {
            return new JsonResponse([
                'error' => 'not found entities',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results['items'] = array_map(function (Client $client) {
            return (new ClientResource($client))->toArray();
        }, $results['items']);

        return $this->json($results);
    }

    /**
     * @Route("/{id<\d+>}", methods="delete", name="client_delete")
     * @throws \Exception
     */
    public function remove(int $id, RemoveClientAction $removeClientAction): JsonResponse {
        $dto = new RemoveEntityByIdDTO($id);

        $client = $removeClientAction->run($dto);

        if (!$client) {
            return new JsonResponse([
                'error' => 'not found entity',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json(['success' => true]);
    }

    /**
     * @Route("/{id<\d+>}", methods="put", name="client_edit")
     * @throws \Exception
     */
    public function edit(int $id, Request $request, EditClientAction $editClientAction): JsonResponse {
        $this->validate($request, new CreateOrUpdateClientConstraint());

        $dto = new EditEntityDTO($id, $request->toArray());

        $client = $editClientAction->run($dto);

        if (!$client) {
            return new JsonResponse([
                'error' => 'not found entity',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $resource = new ClientResource($client);

        return $this->json($resource->toArray());
    }
}