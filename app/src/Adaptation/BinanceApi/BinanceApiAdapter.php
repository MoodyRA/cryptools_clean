<?php

declare(strict_types=1);

namespace Cryptools\Adaptation\BinanceApi;

use Binance\API as BinanceApi;
use Cryptools\Domain\Entity\Trade;

class BinanceApiAdapter implements BinanceApiInterface
{
    /** @var BinanceApi */
    private BinanceApi $binanceApi;

    public function __construct(BinanceApi $binanceApi)
    {
        $this->binanceApi = $binanceApi;
    }

    /**
     * @return array|Trade[]
     * @throws \Exception
     */
    public function trades(): array
    {
        $this->binanceApi->useServerTime();
        return $this->binanceApi->history("FTMUSDT");
    }

}