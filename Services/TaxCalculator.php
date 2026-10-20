<?php

namespace App\Services;


class TaxCalculator
{
    public function calculateTax(float $amount): float
    {
        return $amount * 0.16; // Assuming a 16% tax rate
    }
}