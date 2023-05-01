<?php

namespace App\Tests\Integrations\Controller\Calculator;

use App\Calculator\Exceptions\DivisionByZeroException;
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
	public function testCalc(array $expected, array $input): void
	{
		$requestMock = $this->createMock(Request::class);
		$requestMock->method('getParam')->willReturnOnConsecutiveCalls(...$input);

		if (isset($expected['exception'])) {
			$this->expectException(DivisionByZeroException::class);
		}

		$res = $this->calcController->calc($requestMock);

		$expected = new Response($expected['result']);

		$this->assertSame($expected->getContent(), $res->getContent());
	}


	public static function calcDataProvider(): Generator
	{
		yield 'Test add operation' => [
			'expected' => [
				'result' => 8
			],
			'input' => [
				'operation' => 'add',
				'num1' => 5,
				'num2' => 3
			]
		];
		yield 'Test sub operation' => [
			'expected' => [
				'result' => 1
			],
			'input' => [
				'operation' => 'sub',
				'num1' => 3,
				'num2' => 2
			]
		];
		yield 'Test multiply operation' => [
			'expected' => [
				'result' => 42
			],
			'input' => [
				'operation' => 'multiply',
				'num1' => 7,
				'num2' => 6
			]
		];
		yield 'Test div operation' => [
			'expected' => [
				'result' => 5
			],
			'input' => [
				'operation' => 'division',
				'num1' => 15,
				'num2' => 3
			]
		];
		yield 'Test div operation with zero' => [
			'expected' => [
				'exception' => DivisionByZeroException::class
			],
			'input' => [
				'operation' => 'division',
				'num1' => 10,
				'num2' => 0
			]
		];
	}


	private function prepareCalcController(): CalcController
	{
		return new CalcController();
	}
}
