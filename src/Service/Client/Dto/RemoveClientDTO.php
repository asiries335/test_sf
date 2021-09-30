<?php


namespace App\Service\Client\Dto;


use App\Contracts\DtoContract;

class RemoveClientDTO implements DtoContract
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