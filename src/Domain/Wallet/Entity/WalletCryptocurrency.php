<?php

declare(strict_types = 1);

namespace App\Domain\Wallet\Entity;

use App\Domain\Currency\Entity\Cryptocurrency;

class WalletCryptocurrency extends Cryptocurrency
{
    /**
     * @var float
     */
    protected float $quantity;

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