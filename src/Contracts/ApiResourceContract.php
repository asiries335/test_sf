<?php


namespace App\Contracts;

/**
 * Контракт для ресурсов в апи
 */
interface ApiResourceContract
{
    public function toArray(): array;
}