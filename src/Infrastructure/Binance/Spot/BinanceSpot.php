<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Binance\Spot;

use Binance\API as BinanceApi;
use Cryptools\Domain\Binance\Entity\BinanceApiAccount;
use Cryptools\Domain\Currency\Collection\PairCollection;
use Cryptools\Domain\Currency\Entity\Cryptocurrency;
use Cryptools\Domain\Currency\Entity\Pair;
use Cryptools\Domain\Wallet\Collection\TradeCollection;
use Cryptools\Domain\Wallet\Collection\WalletCryptocurrencyCollection;
use Cryptools\Domain\Wallet\Entity\Trade;
use Cryptools\Domain\Wallet\Entity\WalletCryptocurrency;
use Cryptools\Domain\Wallet\Enum\TradeType;

class BinanceSpot implements BinanceSpotInterface
{
    /** @var BinanceApi */
    private BinanceApi $binanceApi;

    /**
     * @param BinanceApiAccount $account
     * @param bool              $useTest
     * @return BinanceSpot
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
     */
    public function __construct(BinanceApi $binanceApi)
    {
        try {
            $this->binanceApi = $binanceApi;
            $this->binanceApi->useServerTime();
        } catch (\Exception $e) {
            // todo : to handle later
        }
    }

    /**
     * @param Pair $pair
     * @return TradeCollection
     */
    public function trades(Pair $pair): TradeCollection
    {
        try {
            $this->beforeDoingRequest();
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
        }
    }

    /**
     * @return TradeCollection
     * @throws \Exception
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
     * @throws \Exception
     */
    public function allTrades(): TradeCollection
    {
        $pairs = $this->allPairs();
        $trades = new TradeCollection([]);
        /** @var Pair $pair */
        foreach ($pairs->getIterator() as $pair) {
            $trades = $trades->mergeWith($this->trades($pair));
        }
        return $trades;
    }

    /**
     * @return WalletCryptocurrencyCollection
     */
    public function ownedCryptocurrencies(): WalletCryptocurrencyCollection
    {
        try {
            $this->beforeDoingRequest();
            $prices = $this->binanceApi->prices();
            $this->beforeDoingRequest();
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
        }
    }

    /**
     * @return PairCollection
     */
    public function allPairs(): PairCollection
    {
        try {
            $this->beforeDoingRequest();
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
        }
    }

    /**
     * L'api binance n'accepte pas plus de 1200 requêtes par minute, on patiente donc si on arrive à la limite
     * @return void
     */
    private function beforeDoingRequest()
    {
        $transfered = $this->binanceApi->getTransfered();
        if (($this->binanceApi->getRequestCount() % 1150) === 0) {
            sleep(60);
        }
    }
}