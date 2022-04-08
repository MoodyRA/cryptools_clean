<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\Enum;

use Cryptools\Domain\Common\Enum\ReflectionEnum;

class WalletType extends ReflectionEnum
{
    public const MANUAL = 'manual';
    public const BINANCE = 'binance';
}