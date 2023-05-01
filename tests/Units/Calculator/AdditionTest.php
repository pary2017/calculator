<?php

namespace App\Tests\Units;

use App\Calculator\Addition;
use Generator;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{

    /**
     * @dataProvider calcDataProvider
     *
     * @return void
     */
    public function testCalc(float $expected, array $input): void
    {
        $add = new Addition();
        $res = $add->calc($input['num1'], $input['num2']);

        $this->assertSame(number_format($expected, 2), number_format($res, 2));
    }

    public static function calcDataProvider(): Generator
    {
        yield 'Test with two int positive numbers' => [
            'expected' => 25,
            'input' => [
                'operation' => 'add',
                'num1' => 10,
                'num2' => 15
            ]
        ];
        yield 'Test with two int negitive numbers' => [
            'expected' => -16,
            'input' => [
                'operation' => 'add',
                'num1' => -10,
                'num2' => -6
            ]
        ];
        yield 'Test with negitive float numbers' => [
            'expected' => -3.8,
            'input' => [
                'operation' => 'add',
                'num1' => -10.3,
                'num2' => 6.5
            ]
        ];
        yield 'Test with positive float numbers' => [
            'expected' => 5.5,
            'input' => [
                'operation' => 'add',
                'num1' => 21,
                'num2' => -15.5
            ]
        ];
        yield 'Test with zero number' => [
            'expected' => 21,
            'input' => [
                'operation' => 'add',
                'num1' => 21,
                'num2' => 0
            ]
        ];
    }

}