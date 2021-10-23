<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\Entity;

class WalletType
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return WalletType
     */
    public function setId(int $id): WalletType
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return WalletType
     */
    public function setName(string $name): WalletType
    {
        $this->name = $name;
        return $this;
    }
}