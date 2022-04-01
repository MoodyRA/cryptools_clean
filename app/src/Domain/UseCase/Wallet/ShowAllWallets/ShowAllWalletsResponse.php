<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\UseCase\ShowAllWallets;

use Cryptools\Domain\Wallet\Entity\Wallet;

class ShowAllWalletsResponse
{
    /**
     * @var Wallet[]|null
     */
    private $wallets;

    /**
     * @param Wallet[]|null $wallets
     */
    public function setWallets(?array $wallets)
    {
        $this->wallets = $wallets;
    }

    /**
     * @return Wallet[]|null
     */
    public function getWallets(): ?array
    {
        return $this->wallets;
    }
}