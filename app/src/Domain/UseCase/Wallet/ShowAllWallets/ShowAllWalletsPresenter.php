<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\UseCase\ShowAllWallets;

interface howAllWalletsPresenter
{
    /**
     * @param ShowAllWalletsResponse $response
     */
    public function present(ShowAllWalletsResponse $response): void;
}