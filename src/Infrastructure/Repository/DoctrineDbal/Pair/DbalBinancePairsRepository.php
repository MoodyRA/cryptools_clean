<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\DoctrineDbal\Pair;

use App\Domain\Currency\Collection\PairCollection;
use App\Domain\Currency\Entity\Pair;
use App\Domain\Currency\Repository\PairRepository;
use App\Infrastructure\Repository\DoctrineDbal\DbalRepository;
use Doctrine\DBAL\Exception as DBALException;

final class DbalBinancePairsRepository extends DbalRepository implements PairRepository
{

    private const DATATABLE = 'binance_pairs';

    public function insert(Pair $pair): void
    {
        // TODO: Implement insert() method.
    }

    public function insertMany(PairCollection $pairs): void
    {
        $values = [
            'base' => ':base',
            'quote' => ':quote'
        ];
        $query = $this->connection->createQueryBuilder()->insert(self::DATATABLE)->values($values)->getSQL();
        try {
            $this->connection->beginTransaction();
            /** @var Pair $pair */
            foreach ($pairs->getIterator() as $pair) {
                $bindedValues = [
                    'base' => $pair->getBaseCurrency()->getSymbol(),
                    'quote' => $pair->getQuoteCurrency()->getSymbol()
                ];
                $this->connection->executeStatement($query, $bindedValues);
            }
            if (!$this->connection->commit()) {
                $this->connection->rollBack();
            }
        } catch (DBALException $e) {
            if ($this->connection->isTransactionActive()) {
                $this->connection->rollBack();
            }
        }
    }

    public function empty(): void
    {
        try {
            $this->connection->createQueryBuilder()->delete(self::DATATABLE)->executeStatement();
        } catch (DBALException $e) {
        }
    }
}