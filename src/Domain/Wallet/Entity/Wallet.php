<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Wallet\Entity;

/**
 * Entité représentant les données d'un portefeuille
 */
class Wallet
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
     * @var int
     */
    private $type;

    /**
     * Cast en int dans le cas ou la classe est instanciée via PDO::fetchObject() qui ne renvoie que des string
     */
    public function __construct()
    {
        $this->id = (int)$this->id;
        $this->type = (int)$this->type;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Wallet
     */
    public function setId(int $id): Wallet
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
     * @return Wallet
     */
    public function setName(string $name): Wallet
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return Wallet
     */
    public function setType(int $type): Wallet
    {
        $this->type = $type;
        return $this;
    }
}