<?php

declare(strict_types = 1);

use Cryptools\Infrastructure\Controller\HomeController;
use Cryptools\Infrastructure\Controller\WalletController;

$routes = [];

// Home routes
$routes[] = ['method' => 'GET', 'pattern' => '/', 'callable' => [\DI\get(HomeController::class), 'index']];
$routes[] = ['method' => 'GET', 'pattern' => '/hello/{name}', 'callable' => [\DI\get(HomeController::class), 'hello']];

// Wallet routes
$routes[] = ['method' => 'GET', 'pattern' => '/wallets', 'callable' => [\DI\get(WalletController::class), 'showAll']];
$routes[] = ['method' => 'GET', 'pattern' => '/wallets/add', 'callable' => [\DI\get(WalletController::class), 'showCreateForm']];
$routes[] = ['method' => 'GET', 'pattern' => '/wallets/{id}', 'callable' => [\DI\get(WalletController::class), 'show']];
$routes[] = ['method' => 'POST', 'pattern' => '/wallets/add', 'callable' => [\DI\get(WalletController::class), 'create']];
$routes[] = ['method' => 'PATCH', 'pattern' => '/wallets/update/{id}', 'callable' => [\DI\get(WalletController::class), 'update']];
$routes[] = ['method' => 'DELETE', 'pattern' => '/wallets/delete/{id}', 'callable' => [\DI\get(WalletController::class), 'delete']];