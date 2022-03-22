<?php

declare(strict_types=1);

namespace Cryptools\Domain\Entity;

/**
 * Entité représentant les données d'un portefeuille
 */
class Wallet
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var WalletType
     */
    private WalletType $type;
    /**
     * @var WalletCryptocurrency[]
     */
    private array $cryptocurrencies;

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
     * @return WalletCryptocurrency[]
     */
    public function getCryptocurrencies(): array
    {
        return $this->cryptocurrencies;
    }

    /**
     * @param WalletCryptocurrency[] $cryptocurrencies
     * @return Wallet
     */
    public function setCryptocurrencies(array $cryptocurrencies): Wallet
    {
        $this->cryptocurrencies = $cryptocurrencies;
        return $this;
    }


}