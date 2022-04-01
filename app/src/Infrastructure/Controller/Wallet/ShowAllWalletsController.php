<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller\Wallet;

use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWallets;
use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWalletsRequest;
use Cryptools\Infrastructure\Controller\Controller;
use Cryptools\Infrastructure\View\Wallet\ShowAllWalletsView;
use Cryptools\Presentation\Wallet\ShowAllWalletHtmlPresenter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShowAllWalletsController extends Controller
{
    /**
     * @param Request                    $request
     * @param Response                   $response
     * @param ShowAllWallets             $showAllWallets
     * @param ShowAllWalletHtmlPresenter $showAllWalletsPresenter
     * @param ShowAllWalletsView         $showAllWalletsView
     * @return Response
     */
    public function __invoke(
        Request $request,
        Response $response,

        // dependencies
        ShowAllWallets $showAllWallets,
        ShowAllWalletHtmlPresenter $showAllWalletsPresenter,
        ShowAllWalletsView $showAllWalletsView
    ): Response {
        $queryParams = $request->getQueryParams();

        $showAllWallets->execute($showAllWalletsPresenter);
        $viewModel = $showAllWalletsPresenter->viewModel();
        if (
            !empty($queryParams)
            && isset($queryParams['from_delete'])
            && isset($queryParams['deleted_wallet_name'])
            && $queryParams['from_delete'] === '1'
        ) {
            $viewModel->displayDeleteModal = true;
            $viewModel->deleteModalMessage = "Le portefeuille {$queryParams['deleted_wallet_name']} vient d'être supprimé avec succès";
        }
        return $showAllWalletsView->generateView($response, $showAllWalletsPresenter->viewModel());
    }
}