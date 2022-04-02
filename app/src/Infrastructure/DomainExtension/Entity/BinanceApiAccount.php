<?php

declare(strict_types=1);

namespace Cryptools\Infrastructure\DomainExtension\Entity;

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
    private string $secretKey;

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
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     * @return BinanceApiAccount
     */
    public function setSecretKey(string $secretKey): BinanceApiAccount
    {
        $this->secretKey = $secretKey;
        return $this;
    }
}