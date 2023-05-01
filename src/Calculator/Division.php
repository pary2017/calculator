<?php

namespace App\Calculator;

use App\Calculator\Exceptions\DivisionByZeroException;

class Division implements CalcInterface
{
	public function calc(float $num1, float $num2): float
	{
		if (0.0 === $num2) {
			throw new DivisionByZeroException();
		}

		return $num1 / $num2;
	}
}
