<?php


namespace App\Constraint;

use LogicException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PhoneNumberE164Validator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint) {
        if (null === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new LogicException('Value should be string.');
        }

        if (!$constraint instanceof PhoneNumberE164) {
            throw new LogicException(sprintf('You can only pass %s constraint to this validator.', PhoneNumberE164::class));
        }

        if (!preg_match('/^\+[1-9]\d{1,14}$/', $value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}