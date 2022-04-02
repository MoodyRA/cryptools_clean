<?php

declare(strict_types=1);

namespace Cryptools\Adaptation\BinanceApi;

use Cryptools\Domain\Entity\Trade;

interface BinanceApiInterface
{
    /**
     * @return Trade[]|array
     */
    public function trades(): array;
}