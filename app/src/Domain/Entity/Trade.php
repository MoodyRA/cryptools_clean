<?php

declare(strict_types=1);

namespace Cryptools\Domain\Entity;

use DateTime;

class Trade
{
    /** @var DateTime */
    private DateTime $dateTime;
    /** @var string */
    private string $type;
    /** @var Pair */
    private Pair $pair;
    /** @var float */
    private float $unitPrice;
    /** @var float */
    private float $quantity;

    /**
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }

    /**
     * @param DateTime $dateTime
     * @return Trade
     */
    public function setDateTime(DateTime $dateTime): Trade
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Trade
     */
    public function setType(string $type): Trade
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Pair
     */
    public function getPair(): Pair
    {
        return $this->pair;
    }

    /**
     * @param Pair $pair
     * @return Trade
     */
    public function setPair(Pair $pair): Trade
    {
        $this->pair = $pair;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     * @return Trade
     */
    public function setUnitPrice(float $unitPrice): Trade
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return Trade
     */
    public function setQuantity(float $quantity): Trade
    {
        $this->quantity = $quantity;
        return $this;
    }
}