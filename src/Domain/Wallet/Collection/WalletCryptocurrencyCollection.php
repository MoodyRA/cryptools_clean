<?php

namespace Cryptools\Domain\Wallet\Collection;


use Cryptools\Domain\Common\Collection\ArrayCollection;
use Cryptools\Domain\Wallet\Entity\WalletCryptocurrency;
use InvalidArgumentException;

final class WalletCryptocurrencyCollection extends ArrayCollection
{
    /**
     * BinanceApiAccountCollection constructor.
     *
     * @param WalletCryptocurrency[] $cryptocurrencies
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $cryptocurrencies = [])
    {
        foreach ($cryptocurrencies as $cryptocurrency) {
            if (!$cryptocurrency instanceof WalletCryptocurrency) {
                throw new InvalidArgumentException(get_class($cryptocurrency) . ' must be an instance of WalletCryptocurrency');
            }
        }

        parent::__construct($cryptocurrencies);
    }
}