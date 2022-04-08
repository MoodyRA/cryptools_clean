<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Binance\Spot;

use Cryptools\Domain\Currency\Entity\Pair;
use Cryptools\Domain\Wallet\Collection\TradeCollection;

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
}