<?php


namespace App\Service\Client\Actions;


use App\Contracts\ActionContract;
use App\DTO\EditEntityDTO;
use App\Entity\Client;
use App\Form\ClientForm;
use App\Repository\ClientRepository;
use App\Service\Client\Dto\EditClientDTO;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;

final class EditClientAction implements ActionContract
{
    private ClientRepository $clientRepository;
    private FormFactory $formFactory;

    public function __construct(ClientRepository $clientRepository, FormFactoryInterface $formFactory) {
        $this->clientRepository = $clientRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * @param EditEntityDTO $editClientDTO
     * @return Client|null
     * @throws \Exception
     */
    public function run(EditEntityDTO $editClientDTO): ?Client {
        $entityClient = $this->clientRepository->find($editClientDTO->getId());

        if (!$entityClient) {
            return null;
        }

        $form = $this->formFactory->create(ClientForm::class, $entityClient);

        $form->submit($editClientDTO->getData());

        $this->clientRepository->store($entityClient);

        return $entityClient;
    }
}