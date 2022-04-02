<?php

declare(strict_types=1);

namespace Cryptools\Adaptation\BinanceApi;

use Binance\API;

final class BinanceApiFactory
{
    public static function create(string $key, string $secret, bool $useTest = true): BinanceApiInterface
    {
        return new BinanceApiAdapter(new API(
            $key,
            $secret,
            $useTest
        ));
    }
}