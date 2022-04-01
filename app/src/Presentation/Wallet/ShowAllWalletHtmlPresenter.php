<?php

declare(strict_types = 1);

namespace Cryptools\Presentation\Wallet;

use Cryptools\Domain\Wallet\Entity\WalletTypeRepository;
use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWalletsPresenter;
use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWalletsResponse;
use Cryptools\Presentation\Wallet\Model\WalletViewModel;

class ShowAllWalletHtmlPresenter implements ShowAllWalletsPresenter
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

    public function present(ShowAllWalletsResponse $response): void
    {
        $this->viewModel = new ShowAllWalletsHtmlViewModel();
        $wallets = $response->getWallets();
        foreach ($wallets as $wallet) {
            $type = $this->walletTypeRepository->find($wallet->getType());
            $this->viewModel->wallets[] = new WalletViewModel($wallet->getId(), $wallet->getName(), $type->getName());
        }
    }

    public function viewModel(): ShowAllWalletsHtmlViewModel
    {
        return $this->viewModel;
    }
}