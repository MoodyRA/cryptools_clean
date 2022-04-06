<?php

declare(strict_types=1);

namespace Cryptools\Domain\RecurringBuy\Entity;

use Cryptools\Domain\Currency\Entity\Pair;

class RecurringBuy
{
    /** @var int  */
    protected int $id;
    /** @var Pair  */
    protected Pair $pair;
    /** @var string  */
    protected string $startDate;
    /** @var string  */
    protected string $endDate;
    /** @var string  */
    protected string $time;
    /** @var int  */
    protected int $recurrence;
    /** @var \DateTime  */
    protected \DateTime $lastExecution;
    /** @var bool  */
    protected bool $active;
    /** @var float  */
    protected float $amount;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RecurringBuy
     */
    public function setId(int $id): RecurringBuy
    {
        $this->id = $id;
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
     * @return RecurringBuy
     */
    public function setPair(Pair $pair): RecurringBuy
    {
        $this->pair = $pair;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return RecurringBuy
     */
    public function setStartDate(string $startDate): RecurringBuy
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return RecurringBuy
     */
    public function setEndDate(string $endDate): RecurringBuy
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return RecurringBuy
     */
    public function setTime(string $time): RecurringBuy
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return int
     */
    public function getRecurrence(): int
    {
        return $this->recurrence;
    }

    /**
     * @param int $recurrence
     * @return RecurringBuy
     */
    public function setRecurrence(int $recurrence): RecurringBuy
    {
        $this->recurrence = $recurrence;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastExecution(): \DateTime
    {
        return $this->lastExecution;
    }

    /**
     * @param \DateTime $lastExecution
     * @return RecurringBuy
     */
    public function setLastExecution(\DateTime $lastExecution): RecurringBuy
    {
        $this->lastExecution = $lastExecution;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return RecurringBuy
     */
    public function setActive(bool $active): RecurringBuy
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return RecurringBuy
     */
    public function setAmount(float $amount): RecurringBuy
    {
        $this->amount = $amount;
        return $this;
    }
}