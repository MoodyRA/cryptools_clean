<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\Enum;

use Cryptools\Domain\Common\Enum\ReflectionEnum;

class TradeType extends ReflectionEnum
{
    public const PURCHASE = 'purchase';
    public const SALE = 'sale';
}