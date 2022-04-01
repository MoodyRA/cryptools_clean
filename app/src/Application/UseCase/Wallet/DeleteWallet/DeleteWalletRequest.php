<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\UseCase\DeleteWallet;

class DeleteWalletRequest
{
    /**
     * @var int
     */
    private $walletId;

    /**
     * @param int $walletId
     * @return $this
     */
    public function setWalletId(int $walletId): DeleteWalletRequest
    {
        $this->walletId = $walletId;
        return $this;
    }

    /**
     * @return int
     */
    public function getWalletId(): int
    {
        return $this->walletId;
    }
}