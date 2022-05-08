<?php

declare(strict_types = 1);

namespace App\Domain\Wallet\Enum;

use App\Domain\Common\Enum\ReflectionEnum;

class TradeType extends ReflectionEnum
{
    public const PURCHASE = 'purchase';
    public const SALE = 'sale';
}