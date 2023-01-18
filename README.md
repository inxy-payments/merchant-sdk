# Getting Started

## Setup/Install

Install through Composer.

```
composer require inxy-payments/merchant-sdk
```
## Example redirect to pay page
```php
$apiKey      = 'Your api key here';
$config      = new Config(Environment::Sandbox, $apiKey, ApiVersion::v1);
$merchantSDK = new MerchantSDK($config);

$orderAmountInUSD      = 20;
$orderName             = 'Order #1';
$customer              = new Customer('example@mail.com', 'John', 'Doe');
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
$sessionRequest->setPostbackUrl('https://example.com/postback');
$sessionRequest->setCancelUrl('https://example.com/cancel');
$sessionRequest->setSuccessUrl('https://example.com/success');
$sessionRequest->setCustomer($customer);

$sessionResponse = $merchantSDK->createMultiCurrencySession($sessionRequest);

header('Location: ' . $sessionResponse->getRedirectUri());
```

## Example handle webhook
```php
function handleWebhooks($request) {
    $secretKey  = 'Your secret key here';
    $validator  = new Validator($secretKey);
    $signedHash = $request->headers['X-INXY-Payments-Signature'];

    $payload = $request->getBody()->getContents(); // fetch json from your request

    if (!$validator->isValid($payload, $signedHash)) {
        throw new BadRequestException('No valid webhook');
    }

    $data = json_decode($payload, false);

    switch ($data->name) {
        case EventName::PaymentsInit:
            handlePaymentsInitWebhook($data);
            break;
        case EventName::PaymentsWaitingConfirmations:
            handlePaymentsWaitingConfirmationsWebhook($data);
            break;
        case EventName::PaymentsReceived:
            handlePaymentsReceivedWebhook($data);
            break;
        default:
            throw new InvalidArgumentException('Undefined webhook name');
    }
}

function handlePaymentsInitWebhook(stdClass $webhookData) {
    $webhook = PaymentsInitWebhookFactory::create($webhookData);

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::WaitingPayment) {
        /** Waiting first payment */
    }

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::WaitingPaymentPart) {
        /** Waiting part payment after partially paid */
    }

    /** Your code here */
}

function handlePaymentsWaitingConfirmationsWebhook(stdClass $webhookData) {
    $webhook = PaymentsWaitingConfirmationsWebhookFactory::create($webhookData);

    /** Your code here */
}

function handlePaymentsReceivedWebhook(stdClass $webhookData) {
    $webhook = PaymentsReceivedWebhookFactory::create($webhookData);

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::Paid) {
        /** Success payment code */
    }

    if ($webhook->data->paymentIntent->status === PaymentIntentStatus::PartiallyPaid) {
        /** Partially paid actions */
    }

    /** Your code here */
}
```
