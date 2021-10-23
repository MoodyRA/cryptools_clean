<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Cryptools\Domain\Wallet\UseCase\ShowAllWallets\ShowAllWallets;
use Cryptools\Infrastructure\View\Wallet\ShowAllWalletsView;
use Cryptools\Presentation\Wallet\ShowAllWalletHtmlPresenter;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Controller relatif aux wallets (affichage, création, modification, suppression)
 */
class WalletController
{
    /**
     * @var ShowAllWallets
     */
    private $showAllWallets;
    /**
     * @var ShowAllWalletHtmlPresenter
     */
    private $showAllWalletsPresenter;
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
     * Affiche la page de tous les portefeuilles
     *
     * @param Request  $request
     * @param Response $response
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showAll(Request $request, Response $response)
    {
        // besoin de :
        // 1) UseCase pour la récupération de tous les wallets
        // 2) Presenter pour gérer l'affichage
        $this->showAllWallets->execute($this->showAllWalletsPresenter);
        return $this->showAllWalletsView->generateView($response, $this->showAllWalletsPresenter->viewModel());
    }

    /**
     * Affiche la page d'un portefeuille
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args Contient la clé 'id' correspondant à l'id du wallet.
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'wallet-detail.twig', $args);
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function showCreateForm(Request $request, Response $response)
    {
        return $this->view->render($response, 'add-wallet.twig');
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function create(Request $request, Response $response)
    {
        $formValues = $request->getParams();
        return $this->view->render($response, 'all-wallets.twig');
    }
}