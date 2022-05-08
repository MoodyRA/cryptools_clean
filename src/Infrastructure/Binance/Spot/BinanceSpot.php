<?php

declare(strict_types=1);

namespace App\Infrastructure\Binance\Spot;

use Binance\API as BinanceApi;
use App\Domain\Binance\Entity\BinanceApiAccount;
use App\Domain\Currency\Collection\PairCollection;
use App\Domain\Currency\Entity\Cryptocurrency;
use App\Domain\Currency\Entity\Pair;
use App\Domain\Wallet\Collection\TradeCollection;
use App\Domain\Wallet\Collection\WalletCryptocurrencyCollection;
use App\Domain\Wallet\Entity\Trade;
use App\Domain\Wallet\Entity\WalletCryptocurrency;
use App\Domain\Wallet\Enum\TradeType;
use App\Infrastructure\Exception\BinanceException;

class BinanceSpot implements BinanceSpotInterface
{
    /** @var BinanceApi */
    private BinanceApi $binanceApi;

    /**
     * @param BinanceApiAccount $account
     * @param bool $useTest
     * @return BinanceSpot
     * @throws BinanceException
     */
    public static function create(BinanceApiAccount $account, bool $useTest = true): BinanceSpotInterface
    {
        return new self(
            new BinanceApi(
                $account->getKey(),
                $account->getSecret(),
                $useTest
            )
        );
    }

    /**
     * @param BinanceApi $binanceApi
     * @throws BinanceException
     */
    public function __construct(BinanceApi $binanceApi)
    {
        try {
            $this->binanceApi = $binanceApi;
            $this->binanceApi->useServerTime();
        } catch (\Exception $e) {
            throw new BinanceException("Error while getting Binance server time", 0, $e);
        }
    }

    /**
     * @param Pair $pair
     * @return TradeCollection
     * @throws BinanceException
     */
    public function trades(Pair $pair): TradeCollection
    {
        try {
            $entries = $this->binanceApi->history(
                $pair->getBaseCurrency()->getSymbol() . $pair->getQuoteCurrency()->getSymbol()
            );
            $trades = [];
            foreach ($entries as $entry) {
                $tradeType = $entry['isBuyer'] ? new TradeType(TradeType::PURCHASE) : new TradeType(TradeType::SALE);
                $dateTime = new \DateTime();
                $dateTime->setTimestamp((int)($entry['time'] / 1000));
                $trade = new Trade();
                $trade->setPair($pair)
                    ->setType($tradeType)
                    ->setQuantity((float)$entry['qty'])
                    ->setUnitPrice((float)$entry['price'])
                    ->setTime($dateTime);
                $trades[] = $trade;
            }
            return new TradeCollection($trades);
        } catch (\Exception $e) {
            throw new BinanceException("Error while getting trades from a symbol", 0, $e);
        }
    }

    /**
     * @return TradeCollection
     * @throws BinanceException
     */
    public function tradesFromOwnedCurrencies(): TradeCollection
    {
        $cryptocurrencies = $this->ownedCryptocurrencies();
        $pairs = $this->allPairs();
        $pairsByBaseCurrency = $pairs->toArrayByBaseCurrencySymbol();
        $trades = new TradeCollection([]);
        /** @var WalletCryptocurrency $cryptocurrency */
        foreach ($cryptocurrencies as $cryptocurrency) {
            $cryptocurrencyPairs = $pairsByBaseCurrency[$cryptocurrency->getSymbol()];
            foreach ($cryptocurrencyPairs as $pair) {
                $trades = $trades->mergeWith($this->trades($pair));
            }
        }
        return $trades;
    }

    /**
     * @return TradeCollection
     * @throws BinanceException
     */
    public function allTrades(): TradeCollection
    {
        $pairs = $this->allPairs();
        $trades = new TradeCollection([]);
        try {
            /** @var Pair $pair */
            foreach ($pairs->getIterator() as $pair) {
                $trades = $trades->mergeWith($this->trades($pair));
            }
        } catch (\Exception $e) {
            throw new BinanceException("Error while iterating pairs for getting all trades", 0, $e);
        }

        return $trades;
    }

    /**
     * @return WalletCryptocurrencyCollection
     * @throws BinanceException
     */
    public function ownedCryptocurrencies(): WalletCryptocurrencyCollection
    {
        try {
            $prices = $this->binanceApi->prices();
            $balances = $this->binanceApi->balances($prices);

            $cryptocurrencies = [];
            foreach ($balances as $symbol => $asset) {
                if (isset($asset['available']) && (float)$asset['available'] > 0) {
                    $quantity = (float)$asset['available'] + (float)$asset['onOrder'];
                    $cryptocurrency = new WalletCryptocurrency();
                    $cryptocurrency->setSymbol($symbol)
                        ->setQuantity($quantity);
                    $cryptocurrencies[] = $cryptocurrency;
                }
            }
            return new WalletCryptocurrencyCollection($cryptocurrencies);
        } catch (\Exception $e) {
            throw new BinanceException("Error while getting owned cryptocurrencies", 0, $e);
        }
    }

    /**
     * @return PairCollection
     * @throws BinanceException
     */
    public function allPairs(): PairCollection
    {
        try {
            $infos = $this->binanceApi->exchangeInfo();
            $pairs = [];
            foreach ($infos['symbols'] as $symbol) {
                $pair = new Pair();
                $cryptoBase = (new Cryptocurrency())->setSymbol($symbol['baseAsset']);
                $cryptoQuote = (new Cryptocurrency())->setSymbol($symbol['quoteAsset']);
                $pair->setBaseCurrency($cryptoBase)
                    ->setQuoteCurrency($cryptoQuote);
                $pairs[] = $pair;
            }
            return new PairCollection($pairs);
        } catch (\Exception $e) {
            throw new BinanceException("Error while getting all available pairs", 0, $e);
        }
    }
}