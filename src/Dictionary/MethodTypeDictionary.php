<?php

namespace App\Dictionary;

final class MethodTypeDictionary
{
    const DEPOSIT = 'deposit';
    const WITHDRAW = 'withdraw';

    public static function getTypes(): array
    {
        return [
            self::DEPOSIT,
            self::WITHDRAW,
        ];
    }
}
