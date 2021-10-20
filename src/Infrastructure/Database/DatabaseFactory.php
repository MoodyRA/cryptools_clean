<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Database;

use PDO;
use Psr\Container\ContainerInterface;

/**
 * Instanciation d'une classe gérant la connexion à une base de données
 */
final class DatabaseFactory
{
    /**
     * @param ContainerInterface $container
     * @return PDO
     */
    public function __invoke(ContainerInterface $container): PDO
    {
        $databaseConfig = $container->get('config')['database'];
        $dsn = $databaseConfig['driver'] . ':dbname=' . $databaseConfig['name'] . ";host=" . $databaseConfig['host'];
        try {
            return new PDO($dsn, $databaseConfig['username'], $databaseConfig['password']);
        } catch (\Exception $ex) {
            // todo log
        }
    }
}