<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\DoctrineDbal;

use App\Infrastructure\Database\Connection\DoctrineDbal\DbalConnection;
use App\Infrastructure\Repository\BaseRepository;

class DbalRepository implements BaseRepository
{
    /** @var DbalConnection */
    protected DbalConnection $connection;

    /**
     * @param DbalConnection $dbalConnection
     */
    public function __construct(DbalConnection $dbalConnection)
    {
        $this->connection = $dbalConnection;
    }
}