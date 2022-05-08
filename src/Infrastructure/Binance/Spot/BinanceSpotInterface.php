<?php

declare(strict_types=1);

namespace App\Infrastructure\Binance\Spot;

use App\Domain\Currency\Collection\PairCollection;
use App\Domain\Currency\Entity\Pair;
use App\Domain\Wallet\Collection\TradeCollection;

interface BinanceSpotInterface
{
    /**
     * Return all trades of a pair
     *
     * @param Pair $pair
     * @return TradeCollection
     */
    public function trades(Pair $pair): TradeCollection;

    /**
     * Return all trades
     *
     * @return TradeCollection
     */
    public function allTrades(): TradeCollection;

    /**
     * Returns all pairs available on Binance
     *
     * @return PairCollection
     */
    public function allPairs(): PairCollection;
}