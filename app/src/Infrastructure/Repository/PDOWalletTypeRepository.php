<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Database\Repository;

use Cryptools\Domain\Wallet\Entity\WalletType;
use Cryptools\Domain\Wallet\Entity\WalletTypeRepository;

class PDOWalletTypeRepository extends PDORepository implements WalletTypeRepository
{
    public function find(int $typeId): ?WalletType
    {
        $query = "SELECT * FROM wallet_type WHERE id=?";
        $statement = $this->pdo->prepare($query);
        $statement->execute([$typeId]);
        return $statement->fetchObject(WalletType::class);
    }
}