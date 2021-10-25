<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\View\Wallet;

use Cryptools\Infrastructure\View\View;
use Cryptools\Presentation\Wallet\ShowAllWalletsHtmlViewModel;
use Psr\Http\Message\ResponseInterface as Response;

class ShowAllWalletsView extends View
{
    /**
     * @param Response                    $response
     * @param ShowAllWalletsHtmlViewModel $viewModel
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function generateView(Response $response, ShowAllWalletsHtmlViewModel $viewModel)
    {
        return $this->view->render(
            $response,
            'all-wallets.twig',
            [
                'wallets' => $viewModel->wallets,
                'displayDeleteModal' => $viewModel->displayDeleteModal,
                'deleteModalMessage' => $viewModel->deleteModalMessage
            ]
        );
    }
}