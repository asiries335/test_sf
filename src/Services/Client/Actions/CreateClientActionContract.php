<?php


namespace App\Services\Client\Actions;


use App\Contracts\ActionContract;
use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Services\Client\Dto\CreateClientDTOContract;
use Psr\Log\LoggerInterface;

/**
 * Действие для создания клиента
 */
final class CreateClientActionContract implements ActionContract
{
    private ClientRepository $clientRepository;
    private LoggerInterface $logger;

    public function __construct(ClientRepository $clientRepository, LoggerInterface $logger) {
        $this->clientRepository = $clientRepository;
        $this->logger = $logger;
    }

    /**
     * @param CreateClientDTOContract $createClientDTO
     * @return Client
     * @throws \Exception
     */
    public function run(CreateClientDTOContract $createClientDTO): Client {
        $entityClient = new Client();
        $entityClient->setLastName($createClientDTO->getLastName());
        $entityClient->setEmail($createClientDTO->getEmail());
        $entityClient->setFirstName($createClientDTO->getFirstName());
        $entityClient->setPhoneNumber($createClientDTO->getPhoneNumber());

        $this->clientRepository->store($entityClient);

        $this->logger->info("Создался клиент", [
            'email' => $entityClient->getEmail(),
        ]);

        return $entityClient;
    }
}