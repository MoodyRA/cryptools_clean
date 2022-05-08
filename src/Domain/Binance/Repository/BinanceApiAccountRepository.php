<?php

declare(strict_types=1);

namespace App\Domain\Binance\Repository;

use App\Domain\Binance\Entity\BinanceApiAccount;

interface BinanceApiAccountRepository
{
    /**
     * @param int $identifier
     * @return BinanceApiAccount|null
     */
    public function find(int $identifier): ?BinanceApiAccount;
}