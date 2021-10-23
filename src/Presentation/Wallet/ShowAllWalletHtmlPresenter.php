<?php

declare(strict_types = 1);

namespace Cryptools\Presentation\Wallet;

use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWalletsPresenter;
use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWalletsResponse;
use Cryptools\Presentation\Wallet\Model\WalletViewModel;

class ShowAllWalletHtmlPresenter implements ShowAllWalletsPresenter
{
    /**
     * @var ShowAllWalletsHtmlViewModel
     */
    private $viewModel;

    public function present(ShowAllWalletsResponse $response): void
    {
        $this->viewModel = new ShowAllWalletsHtmlViewModel();
        $wallets = $response->getWallets();
        foreach ($wallets as $wallet) {
            $this->viewModel->wallets[] = WalletViewModel::fromWallet($wallet);
        }
    }

    public function viewModel(): ShowAllWalletsHtmlViewModel
    {
        return $this->viewModel;
    }
}