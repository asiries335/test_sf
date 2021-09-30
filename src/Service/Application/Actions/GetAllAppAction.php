<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\PaginatorDTO;
use App\Repository\AppRepository;
use App\Repository\ClientRepository;

final class GetAllAppAction implements ActionContract
{
    private AppRepository $appRepository;

    public function __construct(AppRepository $appRepository) {
        $this->appRepository = $appRepository;
    }

    public function run(PaginatorDTO $paginatorDTO): array{
        return $this->appRepository->paginate($paginatorDTO->getQ(), $paginatorDTO->getL());
    }
}