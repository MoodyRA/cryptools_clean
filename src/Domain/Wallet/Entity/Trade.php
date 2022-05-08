<?php

declare(strict_types = 1);

namespace App\Domain\Wallet\Entity;

use App\Domain\Currency\Entity\Pair;
use App\Domain\Wallet\Enum\TradeType;
use DateTime;

class Trade
{
    /** @var DateTime */
    private DateTime $time;
    /** @var TradeType */
    private TradeType $type;
    /** @var Pair */
    private Pair $pair;
    /** @var float */
    private float $unitPrice;
    /** @var float */
    private float $quantity;

    /**
     * @return DateTime
     */
    public function getTime(): DateTime
    {
        return $this->time;
    }

    /**
     * @param DateTime $time
     * @return Trade
     */
    public function setTime(DateTime $time): Trade
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return TradeType
     */
    public function getType(): TradeType
    {
        return $this->type;
    }

    /**
     * @param TradeType $type
     * @return Trade
     */
    public function setType(TradeType $type): Trade
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