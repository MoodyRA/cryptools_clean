<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\Entity;

/**
 * Permet de modifier un portefeuille dans un système de stockage de données
 */
interface WalletRepository
{
    /**
     * @param int $walletId
     * @return Wallet|null
     */
    public function find(int $walletId): ?Wallet;

    /**
     * @return Wallet[]
     */
    public function findAll(): array;

    /**
     * @param Wallet $wallet
     */
    public function save(Wallet $wallet): void;

    /**
     * @param int $walletId
     */
    public function delete(int $walletId): void;
}