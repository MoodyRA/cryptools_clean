<?php

declare(strict_types=1);

namespace App\Domain\Currency\UseCase\ActualizePairs;

use App\Domain\Currency\Collection\PairCollection;

final class ActualizePairsRequest
{
    /** @var PairCollection */
    private PairCollection $pairCollection;

    /**
     * @param PairCollection $pairCollection
     */
    public function __construct(PairCollection $pairCollection)
    {
        $this->pairCollection = $pairCollection;
    }

    /**
     * @return PairCollection
     */
    public function getPairCollection(): PairCollection
    {
        return $this->pairCollection;
    }
}