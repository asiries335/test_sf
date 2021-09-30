<?php


namespace App\Ui\Api\V1\Constraints\Client;


use App\Contracts\ApiRequestConstraintInterface;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class CreateOrUpdateClientConstraint implements ApiRequestConstraintInterface
{

    public static function list(): Collection {
        return new Collection([
            'email'       => new Email(),
            'firstName'   => [new Length(['min' => 2, 'max' => 32])],
            'lastName'    => new Length(['min' => 2, 'max' => 32]),
            'phoneNumber' => new Length(['min' => 2, 'max' => 32]),
        ]);
    }
}