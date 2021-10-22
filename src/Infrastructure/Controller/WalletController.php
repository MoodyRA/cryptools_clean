<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Controller relatif aux wallets (affichage, création, modification, suppression)
 */
class WalletController extends Controller
{
    /**
     * Affiche la page de tous les portefeuilles
     *
     * @param Request  $request
     * @param Response $response
     * @return Response
     */
    public function showAll(Request $request, Response $response)
    {
        return $this->view->render($response, 'all-wallets.twig');
    }

    /**
     * Affiche la page d'un portefeuille
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args Contient la clé 'id' correspondant à l'id du wallet.
     * @return Response
     */
    public function show(Request $request, Response $response, array $args)
    {
        return $this->view->render($response, 'wallet-detail.twig', $args);
    }

    public function showCreateForm(Request $request, Response $response)
    {
        return $this->view->render($response, 'add-wallet.twig');
    }

    public function create(Request $request, Response $response)
    {
        $formValues = $request->getParams();
        return $this->view->render($response, 'all-wallets.twig');
    }
}