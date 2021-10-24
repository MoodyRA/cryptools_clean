<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller\Wallet;

use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWallets;
use Cryptools\Infrastructure\View\Wallet\ShowAllWalletsView;
use Cryptools\Presentation\Wallet\ShowAllWalletHtmlPresenter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShowAllWalletsController
{
    /**
     * @var ShowAllWallets
     */
    private $showAllWallets;
    /**
     * @var ShowAllWalletHtmlPresenter
     */
    private $showAllWalletsPresenter;
    /**
     * @var ShowAllWalletsView
     */
    private $showAllWalletsView;

    public function __construct(
        ShowAllWallets $showAllWallets,
        ShowAllWalletHtmlPresenter $showAllWalletsPresenter,
        ShowAllWalletsView $showAllWalletsView
    ) {
        $this->showAllWallets = $showAllWallets;
        $this->showAllWalletsPresenter = $showAllWalletsPresenter;
        $this->showAllWalletsView = $showAllWalletsView;
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $this->showAllWallets->execute($this->showAllWalletsPresenter);
        return $this->showAllWalletsView->generateView($response, $this->showAllWalletsPresenter->viewModel());
    }
}