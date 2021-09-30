<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\Repository\ClientRepository;
use App\Service\Client\Dto\GetAllClientDTO;

final class GetAllClientAction implements ActionContract
{
    private ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository) {
        $this->clientRepository = $clientRepository;
    }

    public function run(GetAllClientDTO $getAllClientDTO): array{
        return $this->clientRepository->paginate($getAllClientDTO->getQ(), $getAllClientDTO->getL());
    }
}