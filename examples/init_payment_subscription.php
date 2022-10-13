<?php

require_once('vendor/autoload.php');

use INXY\Payments\Merchant\Config;
use INXY\Payments\Merchant\Enums\Environment;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\MerchantSDK;
use INXY\Payments\Merchant\Http\Requests\SessionRequest;
use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Http\Requests\Dto\Subscription;
use INXY\Payments\Merchant\Http\Requests\Enums\SubscriptionIntervalName;

$apiKey      = 'Your api key here';
$config      = new Config(Environment::Sandbox, $apiKey, ApiVersion::v1);
$merchantSDK = new MerchantSDK($config);

$orderAmountInUSD = 20;
$orderName        = 'Premium plan';
$customer         = new Customer('example@mail.com', 'John', 'Doe');
$subscription     = new Subscription('Premium plan', SubscriptionIntervalName::Month, 1);
$sessionRequest   = new SessionRequest($orderAmountInUSD, $orderName);

$sessionRequest->setOrderId('order_123');
$sessionRequest->setCryptocurrencies([CurrencyCode::USDT, CurrencyCode::BTC]);
$sessionRequest->setPostbackUrl('https://example.com/postback');
$sessionRequest->setCancelUrl('https://example.com/cancel');
$sessionRequest->setSuccessUrl('https://example.com/success');
$sessionRequest->setCustomer($customer);
$sessionRequest->setSubscription($subscription);

$sessionResponse = $merchantSDK->createSession($sessionRequest);

header('Location: ' . $sessionResponse->getRedirectUri());
