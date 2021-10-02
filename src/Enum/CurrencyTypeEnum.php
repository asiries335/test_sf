<?php


namespace App\Enum;


use App\Contract\EnumContract;

/**
 * Перечисление типов валют
 */
class CurrencyTypeEnum implements EnumContract
{
    public const EURO = 'EUR';

    /**
     * @return string[]
     */
    public static function list(): array {
        return [
            self::EURO,
        ];
    }
}