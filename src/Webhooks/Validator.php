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
    public function __construct(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @param string $payload
     * @param string $signedHash
     * @return bool
     */
    public function isValid(string $payload, string $signedHash): bool
    {
        return hash_equals($signedHash, $this->hash($payload));
    }

    /**
     * @param string $payload
     * @return string
     */
    private function hash(string $payload): string
    {
        return hash_hmac('sha256', $payload, $this->secretKey);
    }
}
