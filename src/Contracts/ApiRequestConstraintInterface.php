<?php


namespace App\Contracts;

use Symfony\Component\Validator\Constraints\Collection;

/**
 * Контракт для ограничений реквеста
 */
interface ApiRequestConstraintInterface
{
    public static function list(): Collection;
}