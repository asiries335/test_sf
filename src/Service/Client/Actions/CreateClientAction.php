<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Service\Client\Dto\CreateClientDTO;
use Psr\Log\LoggerInterface;

/**
 * Действие для создания клиента
 */
final class CreateClientAction implements ActionContract
{
    private ClientRepository $clientRepository;
    private LoggerInterface $logger;

    public function __construct(ClientRepository $clientRepository, LoggerInterface $logger) {
        $this->clientRepository = $clientRepository;
        $this->logger = $logger;
    }

    /**
     * @param CreateClientDTO $createClientDTO
     * @return Client
     * @throws \Exception
     */
    public function run(CreateClientDTO $createClientDTO): Client {
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