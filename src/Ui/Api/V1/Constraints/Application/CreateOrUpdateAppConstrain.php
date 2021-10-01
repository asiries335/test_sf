<?php


namespace App\Ui\Api\V1\Constraints\Application;


use App\Contracts\RequestConstraintInterface;
use App\Enum\CurrencyTypeEnum;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Type;

class CreateOrUpdateAppConstrain implements RequestConstraintInterface
{
    public function list(): Collection {
        return new Collection([
            'term'      => new Range(['min' => 10, 'max' => 30]),
            'amount'    => new Range(['min' => 100.00, 'max' => 5000.00]),
            'currency'  => new EqualTo(CurrencyTypeEnum::EURO),
            'client_id' => new Type('int')
        ]);
    }
}