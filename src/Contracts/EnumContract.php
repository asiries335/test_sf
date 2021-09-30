<?php


namespace App\Contracts;

/**
 * Контракт для перечислений
 */
interface EnumContract
{
    public static function list(): array;
}