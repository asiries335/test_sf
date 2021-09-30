<?php


namespace App\DTO;


use App\Contracts\DtoContract;

/**
 * Удалить сущность по ид
 */
class RemoveEntityByIdDTO implements DtoContract
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