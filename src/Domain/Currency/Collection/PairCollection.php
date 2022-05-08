<?php

namespace App\Domain\Currency\Collection;

use App\Domain\Common\Collection\ArrayCollection;
use App\Domain\Currency\Entity\Pair;
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