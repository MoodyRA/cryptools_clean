<?php

namespace Cryptools\Domain\Wallet\UseCase\DeleteWallet;

use Cryptools\Domain\Wallet\Entity\WalletRepository;

class DeleteWallet
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
     * @param DeleteWalletRequest   $request
     * @param DeleteWalletPresenter $presenter
     */
    public function execute(DeleteWalletRequest $request, DeleteWalletPresenter $presenter)
    {
        $response = new DeleteWalletResponse();
        $response->setDeletedWallet($this->walletRepository->find($request->getWalletId()));
        $this->walletRepository->delete($request->getWalletId());
        $wallets = $this->walletRepository->findAll();
        $response->setWallets($wallets);
        $presenter->present($response);
    }
}