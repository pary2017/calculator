<?php

namespace App\Tests\Units;

use App\Calculator\Multiplication;
use Generator;
use PHPUnit\Framework\TestCase;

class MultiplicationTest extends TestCase
{
	/**
	 * @dataProvider calcDataProvider
	 *
	 * @return void
	 */
	public function testCalc(float $expected, array $input): void
	{
		$multiply = new Multiplication();
		$res = $multiply->calc($input['num1'], $input['num2']);

		$this->assertSame(number_format($expected, 2), number_format($res, 2));
	}

	public static function calcDataProvider(): Generator
	{
		yield 'Test with two int positive numbers' => [
			'expected' => 150,
			'input' => [
				'operation' => 'add',
				'num1' => 10,
				'num2' => 15
			]
		];
		yield 'Test with two int negitive numbers' => [
			'expected' => 60,
			'input' => [
				'operation' => 'add',
				'num1' => -10,
				'num2' => -6
			]
		];
		yield 'Test with negitive float numbers' => [
			'expected' => -66.95,
			'input' => [
				'operation' => 'add',
				'num1' => -10.3,
				'num2' => 6.5
			]
		];
		yield 'Test with positive float numbers' => [
			'expected' => -26,
			'input' => [
				'operation' => 'add',
				'num1' => 5,
				'num2' => -5.2
			]
		];
		yield 'Test with zero number' => [
			'expected' => 0,
			'input' => [
				'operation' => 'add',
				'num1' => 21,
				'num2' => 0
			]
		];
	}
}
