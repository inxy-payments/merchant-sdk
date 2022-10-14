<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Webhook
{
    public string $id;
    public string $object;
    public string $name;

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
