<?php

use App\Utils\Kernel;
use App\Utils\Request;

define('BASE_PATH', dirname(__DIR__));

/**
 * Autoloader
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';


$request = Request::createFromGlobals();

$kernel = new Kernel();
$res = $kernel->handle($request);

$res->send();
