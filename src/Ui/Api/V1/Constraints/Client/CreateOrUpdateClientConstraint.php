<?php


namespace App\Ui\Api\V1\Constraints\Client;


use App\Constraint\OnlyLatin;
use App\Constraint\PhoneNumberE164;
use App\Contracts\RequestConstraintInterface;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class CreateOrUpdateClientConstraint implements RequestConstraintInterface
{
    public function list(): Collection {
        return new Collection([
            'email'       => new Email(),
            'firstName'   => [new Length(['min' => 2, 'max' => 32]), new OnlyLatin()],
            'lastName'    => [new Length(['min' => 2, 'max' => 32]), new OnlyLatin()],
            'phoneNumber' => new PhoneNumberE164(),
        ]);
    }
}