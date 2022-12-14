<?php

require_once('vendor/autoload.php');

use GuzzleHttp\Exception\GuzzleException;
use INXY\Payments\Merchant\Config;
use INXY\Payments\Merchant\Enums\Environment;
use INXY\Payments\Merchant\Enums\ApiVersion;
use INXY\Payments\Merchant\MerchantSDK;

$apiKey      = 'Your api key here';
$config      = new Config(Environment::Sandbox, $apiKey, ApiVersion::v1);
$merchantSDK = new MerchantSDK($config);

// Fetch all subscriptions
try {
    $subscriptionsResponse = $merchantSDK->subscriptionsList();

    $pagination    = $subscriptionsResponse->getPagination();
    $subscriptions = $subscriptionsResponse->getList();

    while ($pagination->page < $pagination->lastPage) {
        $subscriptionsResponse = $merchantSDK->subscriptionsList($pagination->page++);
        $pagination            = $subscriptionsResponse->getPagination();

        $subscriptions += $subscriptionsResponse->getList();
    }
} catch (GuzzleException|JsonException $e) {
}

// Fetch subscription by id
try {
    $subscription = $merchantSDK->showSubscription('sub_yJGnv5794DNqlex');
} catch (GuzzleException|JsonException $e) {
}

// Delete subscription by id
try {
    $result = $merchantSDK->deleteSubscription('sub_yJGnv5794DNqlex');

    if ($result === true) {
        echo 'Subscription deleted';
    }
} catch (GuzzleException|JsonException $e) {
}
