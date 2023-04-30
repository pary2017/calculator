<?php

use App\Controllers\CalcController;

return [
	['GET', '/', [CalcController::class, 'index']]
];
