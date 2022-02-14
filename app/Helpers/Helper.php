<?php

namespace App\Helpers;

class Helper
{
    public static function monthWord (int|string $numberMonth): ?string
    {
        $months = [
            'Январь',
            'Февраль',
            'Март',
            'Апрель',
            'Май',
            'Июнь',
            'Июль',
            'Август',
            'Сентябрь',
            'Октябрь',
            'Ноябрь',
            'Декабрь'
        ];

        return $months[$numberMonth - 1] ?? null;
    }
}
