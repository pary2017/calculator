<?php

namespace App\Calculator;

use App\Calculator\CalcInterface;

class Addition implements CalcInterface
{
    public function calc(float $num1, float $num2): float
    {
        return $num1 + $num2;
    }
}
