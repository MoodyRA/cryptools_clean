<?php

use App\Command\UpdateBinancePairsCommand;
use App\Infrastructure\Binance\Spot\BinanceSpot;
use App\Infrastructure\Repository\DoctrineDBAL\DBALConnectionParameters;
use App\Infrastructure\Repository\Binance\DBALBinanceApiAccountRepository;
use App\Infrastructure\Repository\Pair\DBALBinancePairsRepository;


$connectionParameters = new DBALConnectionParameters();
$connectionParameters->setHost('db')
    ->setDatabaseName('cryptools')
    ->setUser('cryptools')
    ->setPassword('cryptools')
    ->setDriver(DBALConnectionParameters::DRIVER_MYSQL);
$binanceAccountRepository = DBALBinanceApiAccountRepository::createFromParameters($connectionParameters);
$binanceAccount = $binanceAccountRepository->find(1);
$binanceSpot = BinanceSpot::create($binanceAccount, false);
$command = new UpdateBinancePairsCommand(
    $binanceSpot,
    DBALBinancePairsRepository::createFromParameters($connectionParameters)
);
$command->execute();