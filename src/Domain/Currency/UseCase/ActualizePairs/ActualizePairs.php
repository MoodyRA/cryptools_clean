<?php

declare(strict_types=1);

namespace App\Domain\Currency\UseCase\ActualizePairs;

use App\Domain\Currency\Repository\PairRepository;

final class ActualizePairs
{
    /** @var PairRepository */
    private PairRepository $pairRepository;

    /**
     * @param PairRepository $pairRepository
     */
    public function __construct(PairRepository $pairRepository)
    {
        $this->pairRepository = $pairRepository;
    }

    /**
     * @param ActualizePairsRequest $request
     * @return void
     */
    public function execute(ActualizePairsRequest $request): void
    {
        $this->pairRepository->empty();
        $this->pairRepository->insertMany($request->getPairCollection());
    }
}