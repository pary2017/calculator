<?php

namespace App\Tests\Units;

use App\Calculator\Division;
use App\Calculator\Exceptions\DivisionByZeroException;
use Generator;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
	/**
	 * @dataProvider calcDataProvider
	 *
	 * @return void
	 */
	public function testCalc(array $expected, array $input): void
	{
		$division = new Division();

        if(isset($expected['exception'])) {
		    $this->expectException(DivisionByZeroException::class);
        }

		$res = $division->calc($input['num1'], $input['num2']);

		$this->assertSame(number_format($expected['result'], 2), number_format($res, 2));
	}

	public static function calcDataProvider(): Generator
	{
		yield 'Test with two int positive numbers' => [
		    'expected' => [
		        'result' => 0.75
		    ],
		    'input' => [
		        'operation' => 'division',
		        'num1' => 6,
		        'num2' => 8
		    ]
		];
		yield 'Test with two int negitive numbers' => [
		    'expected' => [
		        'result' => 10
		    ],
		    'input' => [
		        'operation' => 'division',
		        'num1' => -60,
		        'num2' => -6
		    ]
		];
		yield 'Test with negitive float numbers' => [
		    'expected' => [
		        'result' => -1.58
		    ],
		    'input' => [
		        'operation' => 'division',
		        'num1' => -10.3,
		        'num2' => 6.5
		    ]
		];
		yield 'Test with zero float numbers' => [
		    'expected' => [
		        'result' => 0
		    ],
		    'input' => [
		        'operation' => 'division',
		        'num1' => 0,
		        'num2' => 3.5
		    ]
		];
		yield 'Test with positive float numbers' => [
		    'expected' => [
		        'result' => -1.35
		    ],
		    'input' => [
		        'operation' => 'division',
		        'num1' => 21,
		        'num2' => -15.5
		    ]
		];
		yield 'Test with zero number' => [
			'expected' => [
				'exception' => DivisionByZeroException::class
			],
			'input' => [
				'operation' => 'division',
				'num1' => 21,
				'num2' => 0
			]
		];
	}
}
