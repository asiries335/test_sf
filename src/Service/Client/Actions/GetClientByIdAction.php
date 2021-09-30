<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Service\Client\Dto\GetClientByIdDTO;

/**
 * Действие для поиска клиента по Id
 */
final class GetClientByIdAction implements ActionContract
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function run(GetClientByIdDTO $clientByIdDTO): ?Client {
        return $this->clientRepository->find($clientByIdDTO->getId());
    }
}