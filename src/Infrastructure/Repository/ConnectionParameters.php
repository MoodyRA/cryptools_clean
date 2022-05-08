<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

/**
 * interface ConnectionParameters
 *
 *
 * Objet à instancier pour paramétrer une connection
 */
interface ConnectionParameters
{

    /**
     * Returns an array to used for connection instantiation
     * @return array
     */
    public function getParametersForConnection(): array;
}
