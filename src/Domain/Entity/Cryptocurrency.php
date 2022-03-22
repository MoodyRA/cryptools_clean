<?php

declare(strict_types=1);

namespace Cryptools\Domain\Entity;

class Cryptocurrency
{
    /**
     * @var int
     */
    protected int $id;
    /**
     * @var string
     */
    protected string $name;
    /**
     * @var string
     */
    protected string $symbol;
    /**
     * @var int
     */
    protected int $circulating_supply;
    /**
     * @var int
     */
    protected int $total_supply;
    /**
     * @var int
     */
    protected int $rank;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cryptocurrency
     */
    public function setId(int $id): Cryptocurrency
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
     * @return Cryptocurrency
     */
    public function setName(string $name): Cryptocurrency
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return Cryptocurrency
     */
    public function setSymbol(string $symbol): Cryptocurrency
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return int
     */
    public function getCirculatingSupply(): int
    {
        return $this->circulating_supply;
    }

    /**
     * @param int $circulating_supply
     * @return Cryptocurrency
     */
    public function setCirculatingSupply(int $circulating_supply): Cryptocurrency
    {
        $this->circulating_supply = $circulating_supply;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalSupply(): int
    {
        return $this->total_supply;
    }

    /**
     * @param int $total_supply
     * @return Cryptocurrency
     */
    public function setTotalSupply(int $total_supply): Cryptocurrency
    {
        $this->total_supply = $total_supply;
        return $this;
    }

    /**
     * @return int
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     * @return Cryptocurrency
     */
    public function setRank(int $rank): Cryptocurrency
    {
        $this->rank = $rank;
        return $this;
    }
}