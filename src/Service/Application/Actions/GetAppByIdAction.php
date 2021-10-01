<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\GetEntityByIdDTO;
use App\Entity\Application;
use App\Repository\ApplicationRepository;

final class GetAppByIdAction implements ActionContract
{
    private ApplicationRepository $appRepository;

    public function __construct(ApplicationRepository $appRepository) {
        $this->appRepository = $appRepository;
    }

    /**
     * @param GetEntityByIdDTO $getEntityByIdDTO
     * @return Application|null
     */
    public function run(GetEntityByIdDTO $getEntityByIdDTO): ?Application {
        return $this->appRepository->find($getEntityByIdDTO->getId());
    }
}