<?php

namespace Cryptools\Domain\Currency\Collection;

use Cryptools\Domain\Common\Collection\ArrayCollection;
use Cryptools\Domain\Currency\Entity\Pair;
use InvalidArgumentException;

final class PairCollection extends ArrayCollection
{
    /**
     * BinanceApiAccountCollection constructor.
     *
     * @param Pair[] $pairs
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $pairs = [])
    {
        foreach ($pairs as $pair) {
            if (!$pair instanceof Pair) {
                throw new InvalidArgumentException(get_class($pair) . ' must be an instance of Pair');
            }
        }

        parent::__construct($pairs);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function toArrayByBaseCurrencySymbol(): array
    {
        $byBaseCurrency = [];
        /** @var Pair $pair */
        foreach ($this->getIterator() as $pair) {
            $byBaseCurrency[$pair->getBaseCurrency()->getSymbol()][] = $pair;
        }
        return $byBaseCurrency;
    }
}