<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\UseCase\DeleteWallet;

use Cryptools\Domain\Wallet\Entity\Wallet;

class DeleteWalletResponse
{
    /**
     * @var Wallet[]|null
     */
    private $wallets;
    /**
     * @var Wallet
     */
    private $deletedWallet;

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

    /**
     * @param Wallet $deletedWallet
     */
    public function setDeletedWallet(Wallet $deletedWallet)
    {
        $this->deletedWallet = $deletedWallet;
    }

    /**
     * @return Wallet
     */
    public function getDeletedWallet(): Wallet
    {
        return $this->deletedWallet;
    }
}