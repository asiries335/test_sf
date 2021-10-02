<?php


namespace App\Contract;

use Symfony\Component\Validator\Constraints\Collection;

/**
 * Контракт для ограничений реквеста
 */
interface RequestConstraintContract
{
    public function list(): Collection;
}