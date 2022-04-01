<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller\Wallet;

use Cryptools\Domain\Wallet\UseCase\DeleteWallet\DeleteWallet;
use Cryptools\Domain\Wallet\UseCase\DeleteWallet\DeleteWalletRequest;
use Cryptools\Infrastructure\Controller\Controller;
use Cryptools\Infrastructure\Database\Repository\PDOWalletRepository;
use Cryptools\Infrastructure\View\Wallet\DeleteWalletView;
use Cryptools\Presentation\Wallet\DeleteWalletHtmlPresenter;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

class DeleteWalletController extends Controller
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

    /**
     * @param Request                   $request
     * @param Response                  $response
     * @param App                       $app
     * @param DeleteWallet              $deleteWallet
     * @param DeleteWalletHtmlPresenter $deleteWalletPresenter
     * @param DeleteWalletRequest       $deleteWalletRequest
     * @param DeleteWalletView          $deleteWalletView
     * @param                           $id
     * @return Response
     */
    public function __invoke(
        Request $request,
        Response $response,
        // dependencies
        App $app,
        DeleteWallet $deleteWallet,
        DeleteWalletHtmlPresenter $deleteWalletPresenter,
        DeleteWalletRequest $deleteWalletRequest,
        DeleteWalletView $deleteWalletView,
        PDOWalletRepository $walletRepository,
        // arguments
        $id
    ): Response {
        $deletedWallet = $walletRepository->find((int)$id);
        $deleteWallet->execute(
            $deleteWalletRequest->setWalletId((int)$id),
            $deleteWalletPresenter
        );
        return $response->withRedirect(
            $app->getRouteCollector()->getRouteParser()->urlFor(
                'wallets.show_all',
                [],
                [
                    'from_delete' => '1',
                    'deleted_wallet_name' => $deletedWallet->getName()
                ]
            )
        );
    }
}