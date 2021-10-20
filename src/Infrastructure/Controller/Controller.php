<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Controller;

use Psr\Container\ContainerInterface;

class Controller
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}