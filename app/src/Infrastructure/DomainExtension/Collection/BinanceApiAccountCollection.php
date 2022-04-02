<?php

namespace Cryptools\Infrastructure\DomainExtension\Collection;


use Cryptools\Domain\Collection\ArrayCollection;
use Cryptools\Infrastructure\DomainExtension\Entity\BinanceApiAccount;
use InvalidArgumentException;

final class BinanceApiAccountCollection extends ArrayCollection
{
    /**
     * BinanceApiAccountCollection constructor.
     *
     * @param BinanceApiAccount[] $accounts
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $accounts = [])
    {
        foreach ($accounts as $account) {
            if (!$account instanceof BinanceApiAccount) {
                throw new InvalidArgumentException(get_class($account) . ' must be an instance of BinanceApiAccount');
            }
        }

        parent::__construct($accounts);
    }
}