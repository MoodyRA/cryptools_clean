<?php

declare(strict_types=1);

namespace Cryptools\Infrastructure\DomainExtension\Repository\PDO;

use PDO;

class PDORepository
{
    /**
     * @var PDO
     */
    protected PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}