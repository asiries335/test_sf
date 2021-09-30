<?php


namespace App\Service\Client\Dto;


use App\Contracts\DtoContract;

/**
 * Транспорт поиска  клиента
 */
class GetClientByIdDTO implements DtoContract
{
    private int $id;

    public function __construct(int $id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
}