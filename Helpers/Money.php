<?php

namespace App\Helpers;

class Money
{
    public static function format(float $amount): string
    {
        return '$' . number_format($amount, 2);
    }
}