<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Views\Twig;

class Controller
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * @var Twig
     */
    protected $view;
    /**
     * @var App
     */
    protected $app;

    public function __construct(ContainerInterface $container, App $app)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
        $this->app = $app;
    }
}