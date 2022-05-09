<?php

declare(strict_types=1);

namespace App\Infrastructure\Database\Connection\DoctrineDbal;

use App\Infrastructure\Database\Connection\ConnectionInterface;
use App\Infrastructure\Database\Connection\ConnectionParameters;
use App\Infrastructure\Exception\ConnectionException;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception as DBALException;

class DbalConnection extends Connection implements ConnectionInterface
{

    /**
     * @param ConnectionParameters $parameters
     * @return ConnectionInterface
     * @throws ConnectionException
     */
    public static function createFromParameters(ConnectionParameters $parameters): ConnectionInterface
    {
        try {
            $params = $parameters->getParametersForConnection();
            $params['wrapperClass'] = self::class;
            /** @var DbalConnection $connection */
            $connection = DriverManager::getConnection($params);
            return $connection;
        } catch (DBALException $e) {
            throw new ConnectionException("Doctrine DBAL Connection instantiation failed", 0, $e);
        }
    }
}