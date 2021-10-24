<?php

require __DIR__ . '/routes.php';
require __DIR__ . '/config.php';
if (file_exists(__DIR__ . '/customConfig.php')) {
    require __DIR__ . '/customConfig.php';
}

use Cryptools\Domain\Wallet\Entity\WalletRepository;
use Cryptools\Domain\Wallet\Entity\WalletTypeRepository;
use Cryptools\Infrastructure\Database\DatabaseFactory;
use Cryptools\Infrastructure\Database\Repository\PDOWalletRepository;
use Cryptools\Infrastructure\Database\Repository\PDOWalletTypeRepository;
use Cryptools\Infrastructure\TwigFactory;

// dépendances pour le container
return [
    'config' => $config ?? [],
    'routes' => $routes ?? [],
    'db' => DI\factory(DatabaseFactory::class),
    'view' => DI\factory(TwigFactory::class),
    'views.paths' => ['main' => __DIR__ . '/../views'],
    // class
    WalletRepository::class => DI\autowire(PDOWalletRepository::class),
    WalletTypeRepository::class => DI\autowire(PDOWalletTypeRepository::class)
];