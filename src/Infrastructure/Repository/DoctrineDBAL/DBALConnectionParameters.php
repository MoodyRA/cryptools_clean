<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\DoctrineDBAL;

use App\Infrastructure\Repository\ConnectionParameters;

/**
 * Class DBALConnectionParameters
 *
 *
 * Objet à instancier pour paramétrer une connection
 */
class DBALConnectionParameters implements ConnectionParameters
{

    public const DRIVER_MYSQL = 'pdo_mysql';
    /**
     * @var string
     */
    private string $driver = '';
    /**
     * @var string
     */
    private string $host = '';
    /**
     * @var string
     */
    private string $user = '';
    /**
     * @var string
     */
    private string $password = '';
    /**
     * @var string
     */
    private string $charset = '';
    /**
     * @var string
     */
    private string $databaseName = '';
    /**
     * @var integer
     */
    private int $port = 0;

    /**
     * @param string $driver
     * @return DBALConnectionParameters
     */
    public function setDriver(string $driver): DBALConnectionParameters
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * @param string $host
     * @return DBALConnectionParameters
     */
    public function setHost(string $host): DBALConnectionParameters
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @param string $user
     * @return DBALConnectionParameters
     */
    public function setUser(string $user): DBALConnectionParameters
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string $password
     * @return DBALConnectionParameters
     */
    public function setPassword(string $password): DBALConnectionParameters
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $charset
     * @return DBALConnectionParameters
     */
    public function setCharset(string $charset): DBALConnectionParameters
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * @param string $databaseName
     * @return DBALConnectionParameters
     */
    public function setDatabaseName(string $databaseName): DBALConnectionParameters
    {
        $this->databaseName = $databaseName;
        return $this;
    }

    /**
     * @param int $port
     * @return DBALConnectionParameters
     */
    public function setPort(int $port): DBALConnectionParameters
    {
        $this->port = $port;
        return $this;
    }


    /**
     * Returns an array that can be used for doctine dbal connection instantiation
     * @return array
     */
    public function getParametersForConnection(): array
    {
        $arr_params = [
            'dbname' => $this->databaseName,
            'user' => $this->user,
            'password' => $this->password,
            'host' => $this->host,
            'driver' => $this->driver,
        ];
        // champs optionnels non requis pour établir une connection
        if ($this->charset !== '') {
            $arr_params['charset'] = $this->charset;
        }
        if ($this->port > 0) {
            $arr_params['port'] = $this->port;
        }
        return $arr_params;
    }
}
