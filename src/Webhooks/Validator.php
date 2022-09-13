<?php

namespace INXY\Payments\Merchant\Webhooks;

class Validator
{
    /**
     * @var string
     */
    private $secretKey;

    /**
     * @param string $secretKey
     */
    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @param $payload
     * @param $signedHash
     * @return bool
     */
    public function isValid($payload, $signedHash)
    {
        return hash_equals($signedHash, $this->hash($payload));
    }

    /**
     * @param $payload
     * @return string
     */
    private function hash($payload)
    {
        return hash_hmac('sha256', $payload, $this->secretKey);
    }
}
