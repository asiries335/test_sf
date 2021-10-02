<?php


namespace App\Service\Client\Actions;


use App\Contract\ActionContract;
use App\DTO\PaginatorDTO;
use App\Repository\ClientRepository;

final class GetAllClientAction implements ActionContract
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param PaginatorDTO $paginatorDTO
     * @return array
     */
    public function run(PaginatorDTO $paginatorDTO): array {
        return $this->clientRepository->paginate($paginatorDTO->getQ(), $paginatorDTO->getL());
    }
}