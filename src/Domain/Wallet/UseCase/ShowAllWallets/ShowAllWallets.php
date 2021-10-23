<?php

namespace Cryptools\Domain\Wallet\UseCase\ShowAllWallets;

use Cryptools\Domain\Wallet\Entity\WalletRepository;

class ShowAllWallets
{
    /**
     * @var WalletRepository
     */
    private $walletRepository;

    /**
     * @param WalletRepository $walletRepository
     */
    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    /**
     * @param ShowAllWalletsPresenter $presenter
     */
    public function execute(ShowAllWalletsPresenter $presenter)
    {
        $response = new ShowAllWalletsResponse();
        $wallets = $this->walletRepository->findAll();
        $response->setWallets($wallets);
        $presenter->present($response);
    }
}