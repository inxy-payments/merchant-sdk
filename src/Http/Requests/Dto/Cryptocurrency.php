<?php

namespace INXY\Payments\Merchant\Http\Requests\Dto;

use INXY\Payments\Merchant\Interfaces\Arrayable;

class Cryptocurrency implements Arrayable
{
    /**
     * @var string
     */
    private $code;
    /**
     * @var string
     */
    private $blockchain;
    /**
     * @var string
     */
    private $coinType;

    /**
     * @param string $code
     * @param string $blockchain
     * @param string $coinType
     */
    public function __construct(string $code, string $blockchain, string $coinType)
    {
        $this->code       = $code;
        $this->blockchain = $blockchain;
        $this->coinType   = $coinType;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code'       => $this->code,
            'blockchain' => $this->blockchain,
            'coin_type'  => $this->coinType,
        ];
    }
}
