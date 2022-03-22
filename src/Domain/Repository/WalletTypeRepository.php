<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\Entity;

interface WalletTypeRepository
{
    /**
     * @param int $typeId
     * @return WalletType|null
     */
    public function find(int $typeId): ?WalletType;
}