<?php

declare(strict_types = 1);

use Cryptools\Infrastructure\Controller\{
    HomeController,
    Wallet\CreateWalletController,
    Wallet\DeleteWalletController,
    Wallet\ShowAllWalletsController,
    Wallet\ShowCreateFormWalletController,
    Wallet\ShowWalletController,
    Wallet\UpdateWalletController
};

$routes = [];

// Home routes
$routes[] = [
    'method' => 'GET',
    'pattern' => '/',
    'callable' => HomeController::class,
    'name' => 'home'
];

// Wallet routes
$routes[] = [
    'method' => 'GET',
    'pattern' => '/wallets',
    'callable' => ShowAllWalletsController::class,
    'name' => 'wallets.show_all'
];
$routes[] = [
    'method' => 'GET',
    'pattern' => '/wallets/add',
    'callable' => ShowCreateFormWalletController::class,
    'name' => 'wallets.create_form'
];
$routes[] = [
    'method' => 'GET',
    'pattern' => '/wallets/{id}',
    'callable' => ShowWalletController::class,
    'name' => 'wallet.show'
];
$routes[] = [
    'method' => 'POST',
    'pattern' => '/wallets/add',
    'callable' => CreateWalletController::class,
    'name' => 'wallets.create'
];
$routes[] = [
    'method' => 'PATCH',
    'pattern' => '/wallets/update/{id}',
    'callable' => UpdateWalletController::class,
    'name' => 'wallets.update'
];
$routes[] = [
    'method' => 'DELETE',
    'pattern' => '/wallets/delete/{id}',
    'callable' => DeleteWalletController::class,
    'name' => 'wallets.delete'
];