<?php


namespace App\Ui\Api\V1;


use App\Contracts\RequestConstraintInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class BaseApiController extends AbstractController
{
    protected ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator) {
        $this->validator = $validator;
    }

    /**
     * Валидация реквекста
     *
     * @param Request $request
     * @param RequestConstraintInterface $apiRequestConstraint
     * @return bool|JsonResponse
     */
    public function validate(Request $request, RequestConstraintInterface $apiRequestConstraint) {
        $fails = $this->validator->validate($request->toArray(), $apiRequestConstraint->list());

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

        return true;
    }
}