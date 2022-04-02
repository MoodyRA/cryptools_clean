<?php

declare(strict_types=1);

namespace Cryptools\Database\Connection\PDO;

use Cryptools\Database\Connection\ConnectionConfig;
use PDO;

/**
 * Instanciation d'une classe gérant la connexion à une base de données
 */
final class PDOConnectionFactory
{
    /**
     * @param ConnectionConfig $config
     * @return PDO
     */
    public static function getConnection(ConnectionConfig $config): PDO
    {
        $dsn = $config->getDriver() . ':dbname=' . $config->getDatabase() . ";host=" . $config->getHost();
        try {
            return new PDO($dsn, $config->getUsername(), $config->getPassword());
        } catch (\Exception $ex) {
            // todo log
        }
    }
}