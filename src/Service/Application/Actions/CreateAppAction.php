<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\Entity\Application;
use App\Repository\ApplicationRepository;
use App\Repository\ClientRepository;
use App\Service\Application\Dto\CreateAppDTO;

/**
 * Действие для создания приложения
 */
final class CreateAppAction implements ActionContract
{
    private ApplicationRepository $appRepository;
    private ClientRepository $clientRepository;

    public function __construct(ApplicationRepository $appRepository, ClientRepository $clientRepository) {
        $this->appRepository = $appRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param CreateAppDTO $createAppDTO
     * @return bool|null
     * @throws \Exception
     */
    public function run(CreateAppDTO $createAppDTO): ?Application {
        $client = $this->clientRepository->find($createAppDTO->getClientId());

        if (!$client) {
            return null;
        }

        $app = new Application();
        $app->setClient($client);
        $app->setTerm($createAppDTO->getTerm());
        $app->setAmount($createAppDTO->getAmount());
        $app->setCurrency($createAppDTO->getCurrency());

        $this->appRepository->store($app);

       return $app;
    }
}