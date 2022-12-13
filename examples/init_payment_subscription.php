<?php

require_once('vendor/autoload.php');

use INXY\Payments\Merchant\Config;
use INXY\Payments\Merchant\Enums\Environment;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\MerchantSDK;
use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;
use INXY\Payments\Merchant\Http\Requests\Enums\SubscriptionIntervalName;
use INXY\Payments\Merchant\Http\Requests\MultiCurrencySessionRequest;

use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;
use INXY\Payments\Merchant\Enums\Blockchain;
use INXY\Payments\Merchant\Enums\CoinType;

$apiKey      = 'Your api key here';
$config      = new Config(Environment::Sandbox, $apiKey, ApiVersion::v1);
$merchantSDK = new MerchantSDK($config);

$orderAmountInUSD      = 20;
$orderName             = 'Premium plan';
$customer              = new Customer('example@mail.com', 'John', 'Doe');
$subscription          = new Subscription('Premium plan', SubscriptionIntervalName::Month, 1);
$sessionRequest        = new MultiCurrencySessionRequest($orderAmountInUSD, $orderName, FiatCurrencyCode::USD);
$defaultCryptocurrency = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
$cryptocurrencies      = [];

$cryptocurrencies[] = $defaultCryptocurrency;
$cryptocurrencies[] = new Cryptocurrency(CurrencyCode::USDT, Blockchain::BinanceSmartChain, CoinType::BEP20);
$cryptocurrencies[] = new Cryptocurrency(CurrencyCode::BTC, Blockchain::Bitcoin, CoinType::Native);
$cryptocurrencies[] = new Cryptocurrency(CurrencyCode::ETH, Blockchain::Ethereum, CoinType::Native);
$cryptocurrencies[] = new Cryptocurrency(CurrencyCode::DOGE, Blockchain::Dogecoin, CoinType::Native);
$cryptocurrencies[] = new Cryptocurrency(CurrencyCode::USDC, Blockchain::Ethereum, CoinType::ERC20);

$sessionRequest->setCryptocurrencies($cryptocurrencies);
$sessionRequest->setDefaultCryptocurrency($defaultCryptocurrency);
$sessionRequest->setOrderId('order_123');
$sessionRequest->setCryptocurrencies([CurrencyCode::USDT, CurrencyCode::BTC]);
$sessionRequest->setPostbackUrl('https://example.com/postback');
$sessionRequest->setCancelUrl('https://example.com/cancel');
$sessionRequest->setSuccessUrl('https://example.com/success');
$sessionRequest->setCustomer($customer);
$sessionRequest->setSubscription($subscription);

$sessionResponse = $merchantSDK->createMultiCurrencySession($sessionRequest);

header('Location: ' . $sessionResponse->getRedirectUri());
