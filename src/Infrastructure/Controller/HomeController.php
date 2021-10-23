<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Controller pour les actions de l'accueil
 */
class HomeController extends Controller
{
    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(Request $request, Response $response)
    {
        return $this->view->render($response, 'home.twig');
    }
}