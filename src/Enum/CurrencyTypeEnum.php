<?php


namespace App\Enum;


use App\Contracts\EnumContract;

/**
 * Перечисление типов валют
 */
class CurrencyTypeEnum implements EnumContract
{
    public const EURO = 'euro';

    /**
     * @return string[]
     */
    public static function list(): array {
        return [
            self::EURO,
        ];
    }
}