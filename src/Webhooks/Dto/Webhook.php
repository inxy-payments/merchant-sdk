<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Webhook
{
    /**
     * @var int
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
     * @param int    $id
     * @param string $object
     * @param string $name
     */
    public function __construct(int $id, string $object, string $name)
    {
        $this->id     = $id;
        $this->object = $object;
        $this->name   = $name;
    }
}
