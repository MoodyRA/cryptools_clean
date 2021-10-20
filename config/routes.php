<?php

declare(strict_types = 1);

use Cryptools\Infrastructure\Controller\HomeController;
$test = \DI\get(HomeController::class);

$routes = [
    [
        'method' => 'GET',
        'pattern' => '/',
        'callable' => [\DI\get(HomeController::class), 'index']
    ],
    [
        'method' => 'GET',
        'pattern' => '/hello/{name}',
        'callable' => [\DI\get(HomeController::class), 'hello']
    ],
];