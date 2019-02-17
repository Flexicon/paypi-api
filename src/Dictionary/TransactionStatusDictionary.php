<?php

namespace App\Dictionary;

final class TransactionStatusDictionary
{
    const SUCCESS = 'success';
    const FAILED = 'failed';
    const ERROR = 'error';
    const CANCELLED = 'cancelled';

    public static function getStatuses(): array
    {
        return [
            self::SUCCESS,
            self::FAILED,
            self::ERROR,
            self::CANCELLED,
        ];
    }
}
