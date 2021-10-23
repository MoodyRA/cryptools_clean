<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\View;

use Psr\Container\ContainerInterface;
use Slim\Views\Twig;

class View
{

    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * @var Twig
     */
    protected $view;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
    }
}