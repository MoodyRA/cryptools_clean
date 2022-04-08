<?php

namespace Cryptools\Domain\Wallet\Collection;

use Cryptools\Domain\Common\Collection\ArrayCollection;
use Cryptools\Domain\Wallet\Entity\Trade;
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