<?php


namespace App\Constraint;

use Symfony\Component\Validator\Constraint;

class OnlyLatin extends Constraint
{
    public string $message = 'Only latin';
    public string $mode = 'strict';

    public function validatedBy(): string {
        return static::class . 'Validator';
    }


}