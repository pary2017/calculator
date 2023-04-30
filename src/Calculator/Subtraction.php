<?php

namespace App\Calculator;

class Subtraction implements CalcInterface
{
   public function calc(float $num1, float $num2): float
   {
      return $num1 - $num2;
   }
}