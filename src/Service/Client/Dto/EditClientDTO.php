<?php


namespace App\Service\Client\Dto;


use App\Contracts\DtoContract;

class EditClientDTO implements DtoContract
{
    private int $id;
    private array $data;

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