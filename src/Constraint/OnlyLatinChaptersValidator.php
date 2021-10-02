<?php


namespace App\Constraint;

use LogicException;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class OnlyLatinChaptersValidator extends ConstraintValidator
{

    public function validate($value, Constraint $constraint) {
        if (null === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new LogicException('Value should be string.');
        }

        if (!$constraint instanceof OnlyLatinChapters) {
            throw new LogicException(sprintf('You can only pass %s constraint to this validator.', OnlyLatinChapters::class));
        }

        if (!preg_match('/^[\w\d\s.,-]*$/', $value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}