<?php

use Cryptools\Database\Connection\ConnectionConfig;
use Cryptools\Database\Connection\PDO\PDOConnectionFactory;
use Cryptools\Infrastructure\Repository\PDO\PDOBinanceApiAccountRepository;

require_once 'scriptHeader.php';

$connectionConfig = new ConnectionConfig();
$connectionConfig->setHost('db')
    ->setDatabase('cryptools')
    ->setUsername('cryptools')
    ->setPassword('cryptools')
    ->setDriver(ConnectionConfig::DRIVER_MYSQL);

$connection = PDOConnectionFactory::getConnection($connectionConfig);
$binanceAccountRepository = new PDOBinanceApiAccountRepository($connection);
$binanceAccounts = $binanceAccountRepository->findAll();
var_dump($binanceAccounts);