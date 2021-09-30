<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\DTO\RemoveEntityByIdDTO;
use App\Repository\ClientRepository;

final class RemoveClientAction implements ActionContract
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function run(RemoveEntityByIdDTO $removeClientDTO): ?bool {
        $client = $this->clientRepository->find($removeClientDTO->getId());

        if (!$client) {
            return null;
        }

        $this->clientRepository->remove($client);

        return true;
    }
}