<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\DTO\GetEntityByIdDTO;
use App\Entity\Client;
use App\Repository\ClientRepository;

/**
 * Действие для поиска клиента по Id
 */
final class GetClientByIdAction implements ActionContract
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function run(GetEntityByIdDTO $getEntityByIdDTO): ?Client {
        return $this->clientRepository->find($getEntityByIdDTO->getId());
    }
}