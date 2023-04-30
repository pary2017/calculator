<?php

namespace App\Tests\Integrations\Controller\Calculator;

use App\Controllers\CalcController;
use App\Utils\Request;
use App\Utils\Response;
use Generator;
use PHPUnit\Framework\TestCase;

class CalcControllerTest extends TestCase
{
    private CalcController $calcController;

    /**
     * Summary of setUp
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->calcController = $this->prepareCalcController();
    }

    /**
     * @dataProvider calcDataProvider
     *
     * @return void
     */
    public function testCalc(float $expected, array $input): void
    {
        $_POST['operation'] = $input['operation'];
        $_POST['num1'] = $input['num1'];
        $_POST['num2'] = $input['num2'];

        $res = $this->calcController->calc(Request::createFromGlobals());

        $expected = new Response($expected);

        $this->assertSame($expected->getContent(), $res->getContent());
    }

    /**
     * @dataProvider calcDataProvider
     *
     * @return void
     */
    public function testCalcWithMock(float $expected, array $input): void
    {
        $requestMock = $this->createMock(Request::class);
        $requestMock->method('getParam')->willReturnOnConsecutiveCalls(...$input);

        $res = $this->calcController->calc($requestMock);

        $expected = new Response($expected);

        $this->assertSame($expected->getContent(), $res->getContent());
    }


    public static function calcDataProvider(): Generator
    {
        yield 'Test add operation' => [
            'expected' => 8,
            'input' => [
                'operation' => 'add',
                'num1' => 5,
                'num2' => 3
            ]
        ];
        yield 'Test sub operation' => [
            'expected' => 1,
            'input' => [
                'operation' => 'sub',
                'num1' => 3,
                'num2' => 2
            ]
        ];
        yield 'Test multiply operation' => [
            'expected' => 42,
            'input' => [
                'operation' => 'multiply',
                'num1' => 7,
                'num2' => 6
            ]
        ];
        yield 'Test div operation' => [
            'expected' => 5,
            'input' => [
                'operation' => 'division',
                'num1' => 15,
                'num2' => 3
            ]
        ];
        // yield 'Test div operation with zero' => [
        //     'expected' => 0,
        //     'input' => [
        //         'operation' => 'division',
        //         'num1' => 10,
        //         'num2' => 0
        //     ]
        // ];
    }


    private function prepareCalcController(): CalcController
    {
        return new CalcController();
    }
}
