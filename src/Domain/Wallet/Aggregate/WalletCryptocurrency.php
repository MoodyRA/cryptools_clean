<?php

declare(strict_types=1);

namespace App\Domain\Wallet\Aggregate;

use App\Domain\Currency\Entity\Cryptocurrency;

class WalletCryptocurrency
{
    public function __construct(protected Cryptocurrency $cryptocurrency, protected float $quantity)
    {
    }

    /**
     * @return Cryptocurrency
     */
    public function getCryptocurrency(): Cryptocurrency
    {
        return $this->cryptocurrency;
    }

    /**
     * @param Cryptocurrency $cryptocurrency
     * @return WalletCryptocurrency
     */
    public function setCryptocurrency(Cryptocurrency $cryptocurrency): WalletCryptocurrency
    {
        $this->cryptocurrency = $cryptocurrency;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return WalletCryptocurrency
     */
    public function setQuantity(float $quantity): WalletCryptocurrency
    {
        $this->quantity = $quantity;
        return $this;
    }
}