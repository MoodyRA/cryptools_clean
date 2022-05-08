<?php

declare(strict_types = 1);

namespace App\Domain\Wallet\Entity;

use App\Domain\Wallet\Collection\WalletCryptocurrencyCollection;
use App\Domain\Wallet\Enum\WalletType;

/**
 * Entité représentant les données d'un portefeuille
 */
class Wallet
{
    /** @var int */
    private int $id;
    /** @var string */
    private string $name;
    /** @var WalletType */
    private WalletType $type;
    /** @var WalletCryptocurrencyCollection */
    private WalletCryptocurrencyCollection $cryptocurrencies;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Wallet
     */
    public function setId(int $id): Wallet
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Wallet
     */
    public function setName(string $name): Wallet
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return WalletType
     */
    public function getType(): WalletType
    {
        return $this->type;
    }

    /**
     * @param WalletType $type
     * @return Wallet
     */
    public function setType(WalletType $type): Wallet
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return WalletCryptocurrencyCollection
     */
    public function getCryptocurrencies(): WalletCryptocurrencyCollection
    {
        return $this->cryptocurrencies;
    }

    /**
     * @param WalletCryptocurrencyCollection $cryptocurrencies
     * @return Wallet
     */
    public function setCryptocurrencies(WalletCryptocurrencyCollection $cryptocurrencies): Wallet
    {
        $this->cryptocurrencies = $cryptocurrencies;
        return $this;
    }
}