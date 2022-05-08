<?php

namespace App\Domain\Wallet\Collection;

use App\Domain\Common\Collection\ArrayCollection;
use App\Domain\Wallet\Entity\Trade;
use InvalidArgumentException;

final class TradeCollection extends ArrayCollection
{
    /**
     * BinanceApiAccountCollection constructor.
     *
     * @param Trade[] $trades
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $trades = [])
    {
        foreach ($trades as $trade) {
            if (!$trade instanceof Trade) {
                throw new InvalidArgumentException(get_class($trade) . ' must be an instance of Trade');
            }
        }

        parent::__construct($trades);
    }
}