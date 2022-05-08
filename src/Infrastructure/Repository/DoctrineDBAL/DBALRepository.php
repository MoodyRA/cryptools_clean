<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\DoctrineDBAL;

use App\Infrastructure\Exception\ConnectionException;
use App\Infrastructure\Repository\BaseRepository;
use App\Infrastructure\Repository\ConnectionParameters;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception as DBALException;

class DBALRepository implements BaseRepository
{
    /** @var Connection */
    protected Connection $connection;

    /**
     * @param Connection $dbalConnection
     */
    public function __construct(Connection $dbalConnection)
    {
        $this->connection = $dbalConnection;
    }

    /**
     * @param ConnectionParameters $parameters
     * @return BaseRepository
     * @throws ConnectionException
     */
    public static function createFromParameters(ConnectionParameters $parameters): BaseRepository
    {
        try {
            $class = get_called_class();
            $dbalConnection = DriverManager::getConnection($parameters->getParametersForConnection());
            return new $class($dbalConnection);
        } catch (DBALException $e) {
            throw new ConnectionException("Doctrine DBAL Connection instantiation failed", 0, $e);
        }
    }
}