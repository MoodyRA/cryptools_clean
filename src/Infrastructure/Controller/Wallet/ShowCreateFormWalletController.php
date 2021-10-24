<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller\Wallet;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShowCreateFormWalletController
{
    public function __construct()
    {
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        // todo
    }
}