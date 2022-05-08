<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

interface BaseRepository
{
    /**
     * @param ConnectionParameters $parameters
     * @return BaseRepository
     */
    public static function createFromParameters(ConnectionParameters $parameters): BaseRepository;
}