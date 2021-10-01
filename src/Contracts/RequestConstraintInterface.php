<?php


namespace App\Contracts;

use Symfony\Component\Validator\Constraints\Collection;

/**
 * Контракт для ограничений реквеста
 */
interface RequestConstraintInterface
{
    public function list(): Collection;
}