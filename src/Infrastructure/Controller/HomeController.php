<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController extends Controller
{
    public function index(Request $request, Response $response, $args)
    {
        $response->getBody()->write('<a href="/hello/world">Try /hello/world</a>');
        return $response;
    }

    public function hello(Request $request, Response $response, $args)
    {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    }
}