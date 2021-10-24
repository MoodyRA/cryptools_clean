<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\UseCase\DeleteWallet;

interface DeleteWalletPresenter
{
    /**
     * @param DeleteWalletResponse $response
     */
    public function present(DeleteWalletResponse $response): void;
}