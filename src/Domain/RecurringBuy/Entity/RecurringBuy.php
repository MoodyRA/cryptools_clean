<?php

declare(strict_types = 1);

namespace Cryptools\Domain\RecurringBuy\Entity;

use Cryptools\Domain\Common\ValueObject\Date;
use Cryptools\Domain\Common\ValueObject\Time;
use Cryptools\Domain\Currency\Entity\Pair;

class RecurringBuy
{
    /** @var int */
    protected int $id;
    /** @var Pair */
    protected Pair $pair;
    /** @var Date */
    protected Date $startDate;
    /** @var Date */
    protected Date $endDate;
    /** @var Time */
    protected Time $time;
    /** @var int */
    protected int $recurrence;
    /** @var \DateTime */
    protected \DateTime $lastExecution;
    /** @var bool */
    protected bool $active;
    /** @var float */
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
     * @return Date
     */
    public function getStartDate(): Date
    {
        return $this->startDate;
    }

    /**
     * @param Date $startDate
     * @return RecurringBuy
     */
    public function setStartDate(Date $startDate): RecurringBuy
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return Date
     */
    public function getEndDate(): Date
    {
        return $this->endDate;
    }

    /**
     * @param Date $endDate
     * @return RecurringBuy
     */
    public function setEndDate(Date $endDate): RecurringBuy
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return Time
     */
    public function getTime(): Time
    {
        return $this->time;
    }

    /**
     * @param Time $time
     * @return RecurringBuy
     */
    public function setTime(Time $time): RecurringBuy
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