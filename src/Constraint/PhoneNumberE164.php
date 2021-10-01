<?php


namespace App\Constraint;

use Symfony\Component\Validator\Constraint;

class PhoneNumberE164 extends Constraint
{
    public string $message = 'Only format number E164';
    public string $mode = 'strict';

    public function validatedBy(): string {
        return static::class . 'Validator';
    }
}