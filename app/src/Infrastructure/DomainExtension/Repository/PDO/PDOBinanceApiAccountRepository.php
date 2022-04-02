<?php

declare(strict_types=1);

namespace Cryptools\Infrastructure\DomainExtension\Repository\PDO;

use Cryptools\Infrastructure\DomainExtension\Collection\BinanceApiAccountCollection;
use Cryptools\Infrastructure\DomainExtension\Entity\BinanceApiAccount;
use PDO;

class PDOBinanceApiAccountRepository extends PDORepository
{

    private const DATATABLE = 'binance_api_account';

    /**
     * @return BinanceApiAccountCollection
     */
    public function findAll(): BinanceApiAccountCollection
    {
        $query = "SELECT `id`,`key`,`secret_key` as secretKey FROM " . self::DATATABLE;
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return new BinanceApiAccountCollection(
            $statement->fetchAll(PDO::FETCH_CLASS, BinanceApiAccount::class)
        );
    }
}