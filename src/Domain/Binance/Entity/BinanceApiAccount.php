<?php

declare(strict_types = 1);

namespace App\Domain\Binance\Entity;

class BinanceApiAccount
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $key;
    /**
     * @var string
     */
    private string $secret;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BinanceApiAccount
     */
    public function setId(int $id): BinanceApiAccount
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return BinanceApiAccount
     */
    public function setKey(string $key): BinanceApiAccount
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @param string $secret
     * @return BinanceApiAccount
     */
    public function setSecret(string $secret): BinanceApiAccount
    {
        $this->secret = $secret;
        return $this;
    }
}