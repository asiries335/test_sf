<?php


namespace App\Ui\Api\V1\Resourse\Client;


use App\Contract\ApiResourceContract;
use App\Entity\Client;

/**
 * Ресурс клиента для апи
 */
class ClientResource implements ApiResourceContract
{
    private Client $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function toArray(): array {
        return [
            'id'          => $this->client->getId(),
            'firstName'   => $this->client->getFirstName(),
            'lastName'    => $this->client->getLastName(),
            'email'       => $this->client->getEmail(),
            'phoneNumber' => $this->client->getPhoneNumber(),
        ];
    }
}