<?php


namespace App\DTO;


use App\Contracts\DtoContract;

/**
 * Получить сущность по id
 */
class GetEntityByIdDTO implements DtoContract
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