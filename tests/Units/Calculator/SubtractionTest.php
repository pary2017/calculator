<?php

namespace App\Tests\Units;

use App\Calculator\Subtraction;
use Generator;
use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{

    /**
     * @dataProvider calcDataProvider
     *
     * @return void
     */
    public function testCalc(float $expected, array $input): void
    {
        $sub = new Subtraction();
        $res = $sub->calc($input['num1'], $input['num2']);

        $this->assertSame(number_format($expected, 2), number_format($res, 2));
    }

    public static function calcDataProvider(): Generator
    {
        yield 'Test with two int positive numbers' => [
            'expected' => 17,
            'input' => [
                'operation' => 'sub',
                'num1' => 32,
                'num2' => 15
            ]
        ];

        yield 'Test with two int negative numbers' => [
            'expected' => -17,
            'input' => [
                'operation' => 'sub',
                'num1' => -32,
                'num2' => -15
            ]
        ];

        yield 'Test with zero int positive numbers' => [
            'expected' => 15,
            'input' => [
                'operation' => 'sub',
                'num1' => 15,
                'num2' => 0
            ]
        ];
    }

}