<?php


namespace App\Ui\Api\V1\Resourse\Application;

use App\Contracts\ApiResourceContract;
use App\Entity\Application;

class AppResource implements ApiResourceContract
{
    private Application $application;

    public function __construct(Application $application) {
        $this->application = $application;
    }

    public function toArray(): array {
        return [
            'id'        => $this->application->getId(),
            'client_id' => $this->application->getClient()->getId(),
            'term'      => $this->application->getTerm(),
            'amount'    => $this->application->getAmount(),
            'currency'  => $this->application->getCurrency(),
        ];
    }
}