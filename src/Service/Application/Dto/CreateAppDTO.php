<?php


namespace App\Service\Application\Dto;


use App\Contracts\DtoContract;

/**
 * Транспорт для создания приложения
 */
class CreateAppDTO implements DtoContract
{
    private int $clientId;
    private int $term;
    private float $amount;
    private string $currency;

    public function __construct(
        int $clientId,
        int $term,
        float $amount,
        string $currency
    ) {
        $this->clientId = $clientId;
        $this->term = $term;
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return int
     */
    public function getClientId(): int {
        return $this->clientId;
    }

    /**
     * @return int
     */
    public function getTerm(): int {
        return $this->term;
    }

    /**
     * @return float
     */
    public function getAmount(): float {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string {
        return $this->currency;
    }
}