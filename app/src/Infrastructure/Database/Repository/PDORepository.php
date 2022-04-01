<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Database\Repository;

use PDO;
use Psr\Container\ContainerInterface;

class PDORepository
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * @var PDO
     */
    protected $pdo;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->pdo = $this->container->get('db');
    }
}