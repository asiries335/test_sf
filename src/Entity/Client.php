<?php


namespace App\Entity;

use App\Contract\EntityContract;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client implements EntityContract
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected string $firstName;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected string $lastName;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    protected string $email;

    /**
     * @ORM\Column(type="string", length=16, unique=true)
     */
    protected string $phoneNumber;

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }
}