<?php

namespace App\Controllers;

use App\Calculator\CalcFactory;
use App\Utils\Request;
use App\Utils\Response;

class CalcController
{
	public function index(): Response
	{
		return new Response('<h1>Simple Calculator</h1>');
	}

	public function calc(Request $request): Response
	{
		$calcFactory = new CalcFactory();

		$calculator = $calcFactory->create($request->getParam('operation'));

		return new Response($calculator->calc($request->getParam('num1'), $request->getParam('num2')));
	}
}
