<?php

declare(strict_types = 1);

namespace Cryptools\Domain\Common\ValueObject;

class Time
{
    // hour interval
    public const MIN_HOUR = 0;
    public const MAX_HOUR = 23;
    // minute interval
    public const MIN_MINUTE = 0;
    public const MAX_MINUTE = 59;
    // second interval
    public const MIN_SECOND = 0;
    public const MAX_SECOND = 59;
    /** @var int */
    private int $hour;
    /** @var int */
    private int $minute;
    /** @var int */
    private int $second;

    /**
     * @param int $hour
     * @param int $minute
     * @param int $second
     */
    public function __construct(int $hour, int $minute, int $second)
    {
        $this->verifyHourConformity($hour);
        $this->verifyMinuteConformity($minute);
        $this->verifySecondConformity($second);

        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    /**
     * @param \DateTime $dateTime
     * @return Time
     */
    public static function fromDateTime(\DateTime $dateTime): Time
    {
        return new self(
            (int)$dateTime->format('G'),
            (int)$dateTime->format('i'),
            (int)$dateTime->format('s')
        );
    }

    /**
     * make an instance from current date
     *
     * @return Time
     */
    public static function now(): Time
    {
        return self::fromDateTime(new \DateTime('now'));
    }

    /**
     * @return \DateTime
     */
    public function toDateTime(): \Datetime
    {
        $time = new \DateTime('now');
        $time->setTime($this->hour, $this->minute, $this->second);

        return $time;
    }

    /**
     * @param string $format
     * @return string
     */
    public function toString(string $format = 'H:i:s'): string
    {
        return $this->toDateTime()->format($format);
    }

    /**
     * @return int
     */
    public function getHour(): int
    {
        return $this->hour;
    }

    /**
     * @return int
     */
    public function getMinute(): int
    {
        return $this->minute;
    }

    /**
     * @return int
     */
    public function getSecond(): int
    {
        return $this->second;
    }

    /**
     * @param int $hour
     * @return void
     */
    private function verifyHourConformity(int $hour)
    {
        $options = [
            'options' => ['min_range' => self::MIN_HOUR, 'max_range' => self::MAX_HOUR]
        ];

        if (!filter_var($hour, FILTER_VALIDATE_INT, $options)) {
            throw new \UnexpectedValueException(
                "The hour must be between " . self::MIN_HOUR . " and " . self::MAX_HOUR . ", {$hour} given"
            );
        }
    }

    /**
     * @param int $minute
     * @return void
     */
    private function verifyMinuteConformity(int $minute)
    {
        $options = [
            'options' => ['min_range' => self::MIN_MINUTE, 'max_range' => self::MAX_MINUTE]
        ];

        if (!filter_var($minute, FILTER_VALIDATE_INT, $options)) {
            throw new \UnexpectedValueException(
                "The minute must be between " . self::MIN_MINUTE . " and " . self::MAX_MINUTE . ", {$minute} given"
            );
        }
    }

    /**
     * @param int $second
     * @return void
     */
    private function verifySecondConformity(int $second)
    {
        $options = [
            'options' => ['min_range' => self::MIN_SECOND, 'max_range' => self::MAX_SECOND]
        ];

        if (!filter_var($second, FILTER_VALIDATE_INT, $options)) {
            throw new \UnexpectedValueException(
                "The second must be between " . self::MIN_SECOND . " and " . self::MAX_SECOND . ", {$second} given"
            );
        }
    }
}