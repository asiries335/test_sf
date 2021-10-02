<?php


namespace App\Ui\Api\V1\Constraints\Client;


use App\Constraint\OnlyLatinChapters;
use App\Constraint\PhoneNumberE164;
use App\Contract\RequestConstraintContract;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class CreateOrUpdateClientConstraint implements RequestConstraintContract
{
    public function list(): Collection {
        return new Collection([
            'email'       => new Email(),
            'firstName'   => [new Length(['min' => 2, 'max' => 32]), new OnlyLatinChapters()],
            'lastName'    => [new Length(['min' => 2, 'max' => 32]), new OnlyLatinChapters()],
            'phoneNumber' => new PhoneNumberE164(),
        ]);
    }
}