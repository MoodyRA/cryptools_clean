<?php

declare(strict_types=1);

namespace Cryptools\Domain\Repository;

use Cryptools\Domain\Entity\Wallet;

/**
 * Permet de modifier un portefeuille dans un système de stockage de données
 */
interface WalletRepository extends EntityRepository
{
    /**
     * @param Wallet $wallet
     */
    public function save(Wallet $wallet): void;

    /**
     * @param int $walletId
     */
    public function delete(int $walletId): void;
}