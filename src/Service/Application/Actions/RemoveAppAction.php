<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\RemoveEntityByIdDTO;
use App\Repository\ApplicationRepository;

final class RemoveAppAction implements ActionContract
{
    private ApplicationRepository $appRepository;

    public function __construct(ApplicationRepository $appRepository) {
        $this->appRepository = $appRepository;
    }

    /**
     * @param RemoveEntityByIdDTO $removeClientDTO
     * @return bool|null
     */
    public function run(RemoveEntityByIdDTO $removeClientDTO): ?bool {
        $app = $this->appRepository->find($removeClientDTO->getId());

        if (!$app) {
            return null;
        }

        $this->appRepository->remove($app);

        return true;
    }
}