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
     * @param $id
     * @param $object
     * @param $name
     */
    public function __construct($id, $object, $name)
    {
        $this->id     = $id;
        $this->object = $object;
        $this->name   = $name;
    }
}
