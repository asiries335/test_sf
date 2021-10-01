<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\PaginatorDTO;
use App\Repository\ApplicationRepository;

final class GetAllAppAction implements ActionContract
{
    private ApplicationRepository $appRepository;

    public function __construct(ApplicationRepository $appRepository) {
        $this->appRepository = $appRepository;
    }

    /**
     * @param PaginatorDTO $paginatorDTO
     * @return array
     */
    public function run(PaginatorDTO $paginatorDTO): array {
        return $this->appRepository->paginate($paginatorDTO->getQ(), $paginatorDTO->getL());
    }
}