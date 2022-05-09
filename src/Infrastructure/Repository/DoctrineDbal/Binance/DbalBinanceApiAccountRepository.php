<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\DoctrineDbal\Binance;

use App\Domain\Binance\Entity\BinanceApiAccount;
use App\Domain\Binance\Repository\BinanceApiAccountRepository;
use App\Domain\Currency\Collection\PairCollection;
use App\Domain\Currency\Entity\Pair;
use App\Infrastructure\Repository\DoctrineDbal\DbalRepository;
use Doctrine\DBAL\Exception as DBALException;

final class DbalBinanceApiAccountRepository extends DbalRepository implements BinanceApiAccountRepository
{

    private const DATATABLE = 'binance_api_account';

    /**
     * @param int $identifier
     * @return BinanceApiAccount|null
     */
    public function find(int $identifier): ?BinanceApiAccount
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $query = $queryBuilder
            ->select('*')
            ->from(self::DATATABLE)
            ->where($queryBuilder->expr()->eq('id', ':id'))
            ->getSQL();
        try {
            if (!$entry = $this->connection->fetchAssociative($query, ['id' => $identifier])) {
                return null;
            } else {
                $account = new BinanceApiAccount();
                $account->setId($entry['id'])->setKey($entry['key'])->setSecret($entry['secret_key']);
                return $account;
            }
        } catch (DBALException $e) {
        }
    }
}