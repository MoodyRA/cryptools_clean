<?php

declare(strict_types = 1);

namespace Cryptools\Infrastructure\Binance\Spot;

use Binance\API as BinanceApi;
use Cryptools\Domain\Binance\Entity\BinanceApiAccount;
use Cryptools\Domain\Currency\Entity\Pair;
use Cryptools\Domain\Wallet\Collection\TradeCollection;
use Cryptools\Domain\Wallet\Entity\Trade;
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

    public function allTrades(): TradeCollection
    {
        // TODO: Implement allTrades() method.
    }
}