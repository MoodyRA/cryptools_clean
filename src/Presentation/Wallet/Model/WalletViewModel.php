<?php

declare(strict_types = 1);

namespace Cryptools\Presentation\Wallet\Model;

use Cryptools\Domain\Wallet\Entity\Wallet;

class WalletViewModel
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $type;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @param Wallet $wallet
     * @return WalletViewModel
     */
    public static function fromWallet(Wallet $wallet): WalletViewModel
    {
        return new self($wallet->getName(), $wallet->getType());
    }
}