<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\RemoveEntityByIdDTO;
use App\Repository\AppRepository;

final class RemoveAppAction implements ActionContract
{
    private AppRepository $appRepository;

    public function __construct(AppRepository $appRepository) {
        $this->appRepository = $appRepository;
    }

    public function run(RemoveEntityByIdDTO $removeClientDTO): ?bool {
        $app = $this->appRepository->find($removeClientDTO->getId());

        if (!$app) {
            return null;
        }

        $this->appRepository->remove($app);

        return true;
    }
}