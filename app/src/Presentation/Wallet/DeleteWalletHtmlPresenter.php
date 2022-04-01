<?php

declare(strict_types = 1);

namespace Cryptools\Presentation\Wallet;

use Cryptools\Domain\Wallet\Entity\WalletTypeRepository;
use Cryptools\Domain\Wallet\UseCase\DeleteWallet\DeleteWalletPresenter;
use Cryptools\Domain\Wallet\UseCase\DeleteWallet\DeleteWalletResponse;
use Cryptools\Presentation\Wallet\Model\WalletViewModel;

class DeleteWalletHtmlPresenter implements DeleteWalletPresenter
{
    /**
     * @var ShowAllWalletsHtmlViewModel
     */
    private $viewModel;
    /**
     * @var WalletTypeRepository
     */
    private $walletTypeRepository;

    public function __construct(WalletTypeRepository $walletTypeRepository)
    {
        $this->walletTypeRepository = $walletTypeRepository;
    }

    public function present(DeleteWalletResponse $response): void
    {
        $this->viewModel = new ShowAllWalletsHtmlViewModel();
        $wallets = $response->getWallets();
        foreach ($wallets as $wallet) {
            $type = $this->walletTypeRepository->find($wallet->getType());
            $this->viewModel->wallets[] = new WalletViewModel($wallet->getId(), $wallet->getName(), $type->getName());
        }
        $this->viewModel->displayDeleteModal = true;
        $this->viewModel->deleteModalMessage = "Le Portefeuille {insert name} a bien été supprimé";

    }

    public function viewModel(): ShowAllWalletsHtmlViewModel
    {
        return $this->viewModel;
    }
}