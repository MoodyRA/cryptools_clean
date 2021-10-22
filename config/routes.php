<?php

declare(strict_types = 1);

use Cryptools\Infrastructure\Controller\HomeController;
use Cryptools\Infrastructure\Controller\WalletController;

$routes = [];

// Home routes
$routes[] = [
    'method' => 'GET',
    'pattern' => '/',
    'callable' => [\DI\get(HomeController::class), 'index'],
    'name' => 'home'
];

// Wallet routes
$routes[] = [
    'method' => 'GET',
    'pattern' => '/wallets',
    'callable' => [\DI\get(WalletController::class), 'showAll'],
    'name' => 'wallets.show_all'
];
$routes[] = [
    'method' => 'GET',
    'pattern' => '/wallets/add',
    'callable' => [\DI\get(WalletController::class), 'showCreateForm'],
    'name' => 'wallets.create_form'
];
$routes[] = ['method' => 'GET', 'pattern' => '/wallets/{id}', 'callable' => [\DI\get(WalletController::class), 'show']];
$routes[] = [
    'method' => 'POST',
    'pattern' => '/wallets/add',
    'callable' => [\DI\get(WalletController::class), 'create'],
    'name' => 'wallets.create'
];
$routes[] = [
    'method' => 'PATCH',
    'pattern' => '/wallets/update/{id}',
    'callable' => [\DI\get(WalletController::class), 'update'],
    'name' => 'wallets.update'
];
$routes[] = [
    'method' => 'DELETE',
    'pattern' => '/wallets/delete/{id}',
    'callable' => [\DI\get(WalletController::class), 'delete'],
    'name' => 'wallets.delete'
];