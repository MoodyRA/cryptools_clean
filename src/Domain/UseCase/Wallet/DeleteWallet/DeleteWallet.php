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
     * @param DeleteWalletRequest $request
     */
    public function execute(DeleteWalletRequest $request)
    {
        $response = new DeleteWalletResponse();
        $response->setDeletedWallet($this->walletRepository->find($request->getWalletId()));
        $this->walletRepository->delete($request->getWalletId());
    }
}