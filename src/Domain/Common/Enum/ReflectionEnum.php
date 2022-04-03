<?php

declare(strict_types=1);

namespace Cryptools\Domain\Common\Enum;

use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;
use ReflectionClass;

/**
 * The class that extents ReflectionEnum should only contains constant.
 * Example:
 *
 * public const ERROR_VALIDATION = 'ERROR_VALIDATION';
 * public const ENTITY_NOT_FOUND = 'ENTITY_NOT_FOUND';
 * public const PERSISTENCE_ERROR= 'PERSISTENCE_ERROR';
 */
abstract class ReflectionEnum implements Enum
{
    /**
     * @var mixed $value
     */
    protected mixed $value;

    /**
     * {@inheritDoc}
     *
     * @throws \InvalidArgumentException
     */
    public function __construct($value)
    {
        $constants = static::getAllowedValues();

        if (!in_array($value, $constants, true)) {
            throw new InvalidArgumentException(sprintf('The value "%s" is not available in %s', $value, static::class));
        }

        $this->value = $value;
    }

    /**
     * {@inheritDoc}
     */
    public static function __callStatic(string $enum, array $args = []): Enum
    {
        $constants = static::getAllowedValues();

        if (!array_key_exists($enum, $constants)) {
            throw new InvalidArgumentException(sprintf('The key "%s" is not available in %s', $enum, static::class));
        }

        return new static($constants[$enum]);
    }

    /**
     * {@inheritDoc}
     */
    public static function getAllowedValues(): array
    {
        $self = new ReflectionClass(static::class);

        return $self->getConstants();
    }

    /**
     * {@inheritDoc}
     */
    abstract public function equals(Enum $enum): bool;

    /**
     * {@inheritDoc}
     */
    #[Pure] public function __toString(): string
    {
        return (string) $this->getValue();
    }

    /**
     * {@inheritDoc}
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}