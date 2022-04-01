<?php

declare(strict_types=1);

namespace Cryptools\Database\Connection;

class ConnectionConfig
{

    public const DRIVER_MYSQL = 'mysql';
    /** @var string */
    private string $host;
    /** @var string */
    private string $database;
    /** @var string */
    private string $username;
    /** @var string */
    private string $password;
    /** @var string */
    private string $driver;

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return ConnectionConfig
     */
    public function setHost(string $host): ConnectionConfig
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * @param string $database
     * @return ConnectionConfig
     */
    public function setDatabase(string $database): ConnectionConfig
    {
        $this->database = $database;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return ConnectionConfig
     */
    public function setUsername(string $username): ConnectionConfig
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return ConnectionConfig
     */
    public function setPassword(string $password): ConnectionConfig
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     * @return ConnectionConfig
     */
    public function setDriver(string $driver): ConnectionConfig
    {
        $this->driver = $driver;
        return $this;
    }
}