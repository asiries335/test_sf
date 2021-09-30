<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\Repository\ClientRepository;
use App\Service\Client\Dto\RemoveClientDTO;

final class RemoveClientAction implements ActionContract
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function run(RemoveClientDTO $removeClientDTO): ?bool {
        $client = $this->clientRepository->find($removeClientDTO->getId());

        if (!$client) {
            return null;
        }

        $this->clientRepository->remove($client);

        return true;
    }
}