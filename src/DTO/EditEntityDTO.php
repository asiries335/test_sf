<?php


namespace App\DTO;


use App\Contracts\DtoContract;

/**
 * Редактировать сущности по id
 */
class EditEntityDTO implements DtoContract
{
    private int $id;
    private array $data;

    /**
     * @param int $id
     * @param array $data Поля для измения
     */
    public function __construct(int $id, array $data) {
        $this->id = $id;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getData(): array {
        return $this->data;
    }
}