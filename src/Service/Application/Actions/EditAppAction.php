<?php


namespace App\Service\Application\Actions;


use App\Contract\ActionContract;
use App\DTO\EditEntityDTO;
use App\Entity\Application;
use App\Form\AppForm;
use App\Repository\ApplicationRepository;
use Symfony\Component\Form\FormFactoryInterface;

final class EditAppAction implements ActionContract
{
    private ApplicationRepository $appRepository;
    private FormFactoryInterface $formFactory;

    public function __construct(ApplicationRepository $appRepository, FormFactoryInterface $formFactory) {
        $this->appRepository = $appRepository;
        $this->formFactory = $formFactory;
    }

    /**
     * @param EditEntityDTO $editEntityDTO
     * @return Application|null
     * @throws \Exception
     */
    public function run(EditEntityDTO $editEntityDTO): ?Application {
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