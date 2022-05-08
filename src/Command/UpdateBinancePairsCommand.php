<?php

declare(strict_types=1);

namespace App\Command;

use App\Domain\Currency\Repository\PairRepository;
use App\Domain\Currency\UseCase\ActualizePairs\ActualizePairs;
use App\Domain\Currency\UseCase\ActualizePairs\ActualizePairsRequest;
use App\Infrastructure\Binance\Spot\BinanceSpotInterface;

class UpdateBinancePairsCommand
{
    /** @var BinanceSpotInterface */
    private BinanceSpotInterface $binanceSpot;
    /** @var PairRepository */
    private PairRepository $pairRepository;

    /**
     * @param BinanceSpotInterface $binanceSpot
     * @param PairRepository $pairRepository
     */
    public function __construct(BinanceSpotInterface $binanceSpot, PairRepository $pairRepository)
    {
        $this->binanceSpot = $binanceSpot;
        $this->pairRepository = $pairRepository;
    }

    public function execute()
    {
        $request = new ActualizePairsRequest($this->binanceSpot->allPairs());
        (new ActualizePairs($this->pairRepository))->execute($request);
    }
}