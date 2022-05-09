<?php

use App\Command\UpdateBinancePairsCommand;
use App\Infrastructure\Binance\Spot\BinanceSpot;
use App\Infrastructure\Database\Connection\DoctrineDbal\DbalConnection;
use App\Infrastructure\Database\Connection\DoctrineDbal\DbalConnectionParameters;
use App\Infrastructure\Repository\DoctrineDbal\Binance\DbalBinanceApiAccountRepository;
use App\Infrastructure\Repository\DoctrineDbal\Pair\DbalBinancePairsRepository;


$connectionParameters = new DbalConnectionParameters();
$connectionParameters->setHost('db')
    ->setDatabaseName('cryptools')
    ->setUser('cryptools')
    ->setPassword('cryptools')
    ->setDriver(DbalConnectionParameters::DRIVER_MYSQL);
$connection = DbalConnection::createFromParameters($connectionParameters);
$binanceAccountRepository = new DbalBinanceApiAccountRepository($connection);
$binanceAccount = $binanceAccountRepository->find(1);
$binanceSpot = BinanceSpot::create($binanceAccount, false);
$command = new UpdateBinancePairsCommand(
    $binanceSpot,
   new DbalBinancePairsRepository($connection)
);
$command->execute();