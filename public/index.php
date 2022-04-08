<?php

require_once __DIR__ .'/../vendor/autoload.php';

use Cryptools\Domain\Wallet\Entity\Trade;
use Cryptools\Domain\Wallet\Enum\TradeType;

echo 'Hello Cryptools !';

$trade = new Trade();
$tradeType = TradeType::getAllowedValues();

$tradeType = new TradeType(TradeType::PURCHASE);

var_dump($tradeType->__toString());