<?php

declare(strict_types=1);

namespace App\Infrastructure\Database\Connection\DoctrineDbal;

use App\Infrastructure\Database\Connection\ConnectionParameters;

/**
 * Class DbalConnectionParameters
 *
 *
 * Objet à instancier pour paramétrer une connection
 */
class DbalConnectionParameters implements ConnectionParameters
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
     * @return DbalConnectionParameters
     */
    public function setDriver(string $driver): DbalConnectionParameters
    {
        $this->driver = $driver;
        return $this;
    }

    /**
     * @param string $host
     * @return DbalConnectionParameters
     */
    public function setHost(string $host): DbalConnectionParameters
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @param string $user
     * @return DbalConnectionParameters
     */
    public function setUser(string $user): DbalConnectionParameters
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string $password
     * @return DbalConnectionParameters
     */
    public function setPassword(string $password): DbalConnectionParameters
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @param string $charset
     * @return DbalConnectionParameters
     */
    public function setCharset(string $charset): DbalConnectionParameters
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * @param string $databaseName
     * @return DbalConnectionParameters
     */
    public function setDatabaseName(string $databaseName): DbalConnectionParameters
    {
        $this->databaseName = $databaseName;
        return $this;
    }

    /**
     * @param int $port
     * @return DbalConnectionParameters
     */
    public function setPort(int $port): DbalConnectionParameters
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
