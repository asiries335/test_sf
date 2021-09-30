<?php


namespace App\Entity;


use App\Contracts\EntityContract;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationRepository")
 */
class Application implements EntityContract
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="applications")
     * @ORM\JoinColumn(nullable=false)
     */
    protected Client $client;

    /**
     * @ORM\Column(type="integer")
     */
    protected int $term;

    /**
     * @ORM\Column(type="float")
     */
    protected float $amount;

    /**
     * @ORM\Column(type="string")
     */
    protected string $currency;

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
     * @return Client
     */
    public function getClient(): Client {
        return $this->client;
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client): void {
        $this->client = $client;
    }

    /**
     * @return int
     */
    public function getTerm(): int {
        return $this->term;
    }

    /**
     * @param int $term
     */
    public function setTerm(int $term): void {
        $this->term = $term;
    }

    /**
     * @return float
     */
    public function getAmount(): float {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void {
        $this->currency = $currency;
    }


}