<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\DTO\EditEntityDTO;
use App\Entity\Application;
use App\Form\AppForm;
use App\Repository\AppRepository;
use Symfony\Component\Form\FormFactoryInterface;

final class EditAppAction implements ActionContract
{
    private AppRepository $appRepository;
    private FormFactoryInterface $formFactory;

    public function __construct(AppRepository $appRepository, FormFactoryInterface $formFactory) {
        $this->appRepository = $appRepository;
        $this->formFactory = $formFactory;
    }

    public function run(EditEntityDTO $editEntityDTO):?Application{
        $entityApp = $this->appRepository->find($editEntityDTO->getId());

        if (!$entityApp) {
            return null;
        }

        $form = $this->formFactory->create(AppForm::class, $entityApp);

        $form->submit($editEntityDTO->getData());

        $this->appRepository->store($entityApp);

        return $entityApp;
    }
}