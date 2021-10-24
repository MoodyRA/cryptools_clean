<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller\Wallet;

use Cryptools\Domain\Wallet\UseCase\DeleteWallet\DeleteWallet;
use Cryptools\Domain\Wallet\UseCase\DeleteWallet\DeleteWalletRequest;
use Cryptools\Infrastructure\View\Wallet\DeleteWalletView;
use Cryptools\Presentation\Wallet\DeleteWalletHtmlPresenter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DeleteWalletController
{
    /**
     * @var DeleteWallet
     */
    private $deleteWallet;
    /**
     * @var DeleteWalletHtmlPresenter
     */
    private $deleteWalletPresenter;
    /**
     * @var DeleteWalletRequest
     */
    private $deleteWalletRequest;
    /**
     * @var DeleteWalletView
     */
    private $deleteWalletView;

    public function __construct(
        DeleteWallet $deleteWallet,
        DeleteWalletHtmlPresenter $deleteWalletPresenter,
        DeleteWalletRequest $deleteWalletRequest,
        DeleteWalletView $deleteWalletView
    ) {
        $this->deleteWallet = $deleteWallet;
        $this->deleteWalletPresenter = $deleteWalletPresenter;
        $this->deleteWalletRequest = $deleteWalletRequest;
        $this->deleteWalletView = $deleteWalletView;
        echo 'foo';
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->deleteWallet->execute(
            $this->deleteWalletRequest->setWalletId((int)$args['id']),
            $this->deleteWalletPresenter
        );
        //return $response->withRedirect('/');
        return $this->deleteWalletView->generateView($response, $this->deleteWalletPresenter->viewModel());
    }
}