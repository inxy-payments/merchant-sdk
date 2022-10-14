<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Webhook
{
    /**
     * @var string
     */
    public $id;
    /**
     * @var string
     */
    public $object;
    /**
     * @var string
     */
    public $name;

    /**
     * @param string $id
     * @param string $object
     * @param string $name
     */
    public function __construct(string $id, string $object, string $name)
    {
        $this->id     = $id;
        $this->object = $object;
        $this->name   = $name;
    }
}
