<?php


namespace App\Services\Client\Dto;

use App\Contracts\DtoContract;

/**
 * Транспорт для создания клиента
 */
class CreateClientDTOContract implements DtoContract
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;

    public function __construct(string $firstName, string $lastName, string $email, string $phoneNumber) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }
}