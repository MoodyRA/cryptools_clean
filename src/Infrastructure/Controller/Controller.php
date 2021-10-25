<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Monolog\Logger;
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
    /**
     * @var Logger
     */
    protected $logger;

    public function __construct(ContainerInterface $container, App $app)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
        $this->app = $app;
        $this->logger = $container->get('logger');
    }
}