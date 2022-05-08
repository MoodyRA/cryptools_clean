<?php

declare(strict_types = 1);

namespace App\Domain\Wallet\Enum;

use App\Domain\Common\Enum\ReflectionEnum;

class WalletType extends ReflectionEnum
{
    public const MANUAL = 'manual';
    public const BINANCE = 'binance';
}