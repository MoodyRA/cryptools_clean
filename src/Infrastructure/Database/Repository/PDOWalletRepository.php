<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Database\Repository;

use Cryptools\Domain\Wallet\Entity\Wallet;
use Cryptools\Domain\Wallet\Entity\WalletRepository;
use PDO;

class PDOWalletRepository extends PDORepository implements WalletRepository
{
    public function find(int $walletId): ?Wallet
    {
        $query = "SELECT * FROM wallet WHERE id=?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$walletId]);
        return $statement->fetchObject(Wallet::class);
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM wallet";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Wallet::class);
    }

    public function save(Wallet $wallet): void
    {
        // TODO: Implement save() method.
    }

    public function delete(int $walletId): void
    {
        $query = "DELETE FROM wallet WHERE id=?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$walletId]);
    }
}