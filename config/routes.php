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
    'methods' => ['GET'],
    'pattern' => '/',
    'callable' => HomeController::class,
    'name' => 'home'
];

// Wallet routes
$routes[] = [
    'methods' => ['GET'],
    'pattern' => '/wallets',
    'callable' => ShowAllWalletsController::class,
    'name' => 'wallets.show_all'
];
$routes[] = [
    'methods' => ['GET'],
    'pattern' => '/wallets/add',
    'callable' => ShowCreateFormWalletController::class,
    'name' => 'wallets.create_form'
];
$routes[] = [
    'methods' => ['GET'],
    'pattern' => '/wallets/{id}',
    'callable' => ShowWalletController::class,
    'name' => 'wallet.show'
];
$routes[] = [
    'methods' => ['POST'],
    'pattern' => '/wallets/add',
    'callable' => CreateWalletController::class,
    'name' => 'wallets.create'
];
$routes[] = [
    'methods' => ['PATCH'],
    'pattern' => '/wallets/update/{id}',
    'callable' => UpdateWalletController::class,
    'name' => 'wallets.update'
];
$routes[] = [
    'methods' => ['GET'],
    'pattern' => '/wallets/delete/{id}',
    'callable' => DeleteWalletController::class,
    'name' => 'wallets.delete'
];