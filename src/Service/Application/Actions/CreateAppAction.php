<?php


namespace App\Service\Application\Actions;


use App\Contracts\ActionContract;
use App\Service\Application\Dto\CreateAppDTO;
use Psr\Log\LoggerInterface;

/**
 * Действие для создания приложения
 */
final class CreateAppAction implements ActionContract
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function run(CreateAppDTO $createAppDTO) {

    }
}