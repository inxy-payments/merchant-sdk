<?php

require_once('vendor/autoload.php');

use INXY\Payments\Merchant\Config;
use INXY\Payments\Merchant\Enums\Environment;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\Http\Requests\CryptoCryptoSessionRequest;
use INXY\Payments\Merchant\MerchantSDK;
use INXY\Payments\Merchant\Enums\CurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Customer;
use INXY\Payments\Merchant\Enums\FiatCurrencyCode;
use INXY\Payments\Merchant\Http\Requests\Dto\Cryptocurrency;
use INXY\Payments\Merchant\Enums\Blockchain;
use INXY\Payments\Merchant\Enums\CoinType;
use GuzzleHttp\Exception\GuzzleException;

$apiKey      = 'Your api key here';
$config      = new Config(Environment::Sandbox, $apiKey, ApiVersion::v1);
$merchantSDK = new MerchantSDK($config);

$orderAmountInCrypto   = 20;
$orderName             = 'Order #1';
$customer              = new Customer('example@mail.com', 'John', 'Doe');
$defaultCryptocurrency = new Cryptocurrency(CurrencyCode::USDT, Blockchain::Ethereum, CoinType::ERC20);
$sessionRequest        = new CryptoCryptoSessionRequest($orderAmountInCrypto, $orderName, $defaultCryptocurrency,FiatCurrencyCode::USD);

$sessionRequest->setOrderId('order_123');
$sessionRequest->setPostbackUrl('https://example.com/postback');
$sessionRequest->setCancelUrl('https://example.com/cancel');
$sessionRequest->setSuccessUrl('https://example.com/success');
$sessionRequest->setCustomer($customer);
$sessionRequest->setLifeTimeMinutes(60);
$sessionRequest->setAmountDeviationPercentage(1);

try {
    $sessionResponse = $merchantSDK->createCryptoCryptoSession($sessionRequest);

    header('Location: ' . $sessionResponse->getRedirectUri());
} catch (JsonException|GuzzleException $e) {
}
