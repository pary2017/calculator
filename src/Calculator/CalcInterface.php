<?php

namespace App\Calculator;

interface CalcInterface
{
    public function calc(float $num1, float $num2): float;
}
