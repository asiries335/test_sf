<?php


namespace App\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @see https://www.twilio.com/docs/glossary/what-e164#regex-matching-for-e164
 */
class PhoneNumberE164 extends Constraint
{
    public string $message = 'Only format number E164';
    public string $mode = 'strict';

    public function validatedBy(): string {
        return static::class . 'Validator';
    }
}