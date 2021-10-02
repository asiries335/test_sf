<?php


namespace App\DTO;


use App\Contract\DtoContract;

class PaginatorDTO implements DtoContract
{
    private int $q;
    private int $l;

    public function __construct(int $q, int $l) {
        $this->q = $q;
        $this->l = $l;
    }

    /**
     * @return int
     */
    public function getQ(): int {
        return $this->q;
    }

    /**
     * @return int
     */
    public function getL(): int {
        return $this->l;
    }
}