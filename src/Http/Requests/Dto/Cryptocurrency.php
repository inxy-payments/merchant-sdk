<?php

namespace INXY\Payments\Merchant\Http\Requests\Dto;

use INXY\Payments\Merchant\Interfaces\Arrayable;

class Cryptocurrency implements Arrayable
{
    private $code;
    private $blockchain;
    private $coinType;

    /**
     * @param $code
     * @param $blockchain
     * @param $coinType
     */
    public function __construct($code, $blockchain, $coinType)
    {
        $this->code       = $code;
        $this->blockchain = $blockchain;
        $this->coinType   = $coinType;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'code'       => $this->code,
            'blockchain' => $this->blockchain,
            'coin_type'  => $this->coinType,
        ];
    }
}
