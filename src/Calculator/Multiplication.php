<?php

namespace App\Calculator;

class Multiplication implements CalcInterface
{
   public function calc(float $num1, float $num2): float
   {
      return $num1 * $num2;
   }
}