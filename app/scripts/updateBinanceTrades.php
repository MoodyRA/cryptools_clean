<?php

use Cryptools\Adaptation\BinanceApi\BinanceApiFactory;
use Cryptools\Database\Connection\ConnectionConfig;
use Cryptools\Database\Connection\PDO\PDOConnectionFactory;
use Cryptools\Infrastructure\DomainExtension\Entity\BinanceApiAccount;
use Cryptools\Infrastructure\DomainExtension\Repository\PDO\PDOBinanceApiAccountRepository;

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

try {
/** @var BinanceApiAccount $account */
foreach ($binanceAccounts->getIterator() as $account) {
    $binanceApi = BinanceApiFactory::create($account->getKey(), $account->getSecretKey(), false);
    $trades = $binanceApi->trades();
    foreach ($trades as $trade) {
        var_dump($trade);
    }
}
} catch (Exception $e) {
    var_dump($e->getMessage());
}
