<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Common\ValueObject;

class Date
{
    /** @var int */
    private int $year;
    /** @var int */
    private int $month;
    /** @var int */
    private int $day;

    /**
     *
     * @param int $day
     * @param int $month
     * @param int $year
     */
    public function __construct(int $day, int $month, int $year)
    {
        \DateTime::createFromFormat('Y-m-d', "{$year}-{$month}-{$day}");
        $lastErrors = \DateTime::getLastErrors();
        if ($lastErrors['warning_count'] > 0 || $lastErrors['error_count'] > 0) {
            throw new \UnexpectedValueException("the date created from arguments is incorrect");
        }

        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * @param \DateTime $dateTime
     * @return Date
     */
    public static function fromDateTime(\DateTime $dateTime): Date
    {
        return new self(
            (int)$dateTime->format('d'),
            (int)$dateTime->format('m'),
            (int)$dateTime->format('Y')
        );
    }

    /**
     * make an instance from current date
     *
     * @return Date
     */
    public static function today(): Date
    {
        return self::fromDateTime(new \DateTime('now'));
    }

    /**
     * @return \DateTime
     */
    public function toDateTime(): \Datetime
    {
        $date = new \DateTime();
        $date->setDate($this->year, $this->month, $this->day);
        $date->setTime(0, 0, 0);

        return $date;
    }

    /**
     * @param string $format
     * @return string
     */
    public function toString(string $format = 'Y-m-d'): string
    {
        return $this->toDateTime()->format($format);
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }
}