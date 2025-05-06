<?php

require_once('vendor/autoload.php');

use GuzzleHttp\Exception\GuzzleException;
use INXY\Payments\Merchant\Config;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\Enums\Environment;
use INXY\Payments\Merchant\MerchantSDK;

$apiKey      = 'Your api key here';
$config      = new Config(Environment::Sandbox, $apiKey, ApiVersion::v1);
$merchantSDK = new MerchantSDK($config);

$orderIdOrSessionHash = 'your_order_id_or_session_hash';

try {
    $sessionStatus = $merchantSDK->getSessionStatus($orderIdOrSessionHash);
    $session       = $sessionStatus->getSession();
    $paymentIntent = $sessionStatus->getPaymentIntent();
} catch (JsonException|GuzzleException $e) {
}
