<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\GetEntityByIdDTO;
use App\Entity\Application;
use App\Repository\AppRepository;

final class GetAppByIdAction implements ActionContract
{
    private AppRepository $appRepository;

    public function __construct(AppRepository $appRepository) {
        $this->appRepository = $appRepository;
    }

    public function run(GetEntityByIdDTO $getEntityByIdDTO): ?Application {
        return $this->appRepository->find($getEntityByIdDTO->getId());
    }
}