<?php

namespace App\Dictionary;

final class GenderDictionary
{
    const MALE = 'M';
    const FEMALE = 'F';

    public static function getGenders(): array
    {
        return [
            self::MALE,
            self::FEMALE,
        ];
    }
}
