<?php


namespace App\Contract;

/**
 * Контракт для ресурсов в апи
 */
interface ApiResourceContract
{
    public function toArray(): array;
}