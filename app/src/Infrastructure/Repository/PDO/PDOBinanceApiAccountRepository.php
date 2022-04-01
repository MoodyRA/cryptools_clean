<?php

declare(strict_types=1);

namespace Cryptools\Infrastructure\Repository\PDO;

use Cryptools\Infrastructure\Entity\BinanceApiAccount;
use PDO;

class PDOBinanceApiAccountRepository extends PDORepository
{

    private const DATATABLE = 'binance_api_account';

    /**
     * @return BinanceApiAccount[]
     */
    public function findAll(): array
    {
        $query = "SELECT * FROM " . self::DATATABLE;
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, BinanceApiAccount::class);
    }
}