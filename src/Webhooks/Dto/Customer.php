<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Customer
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
    public $email;
    /**
     * @var string|null
     */
    public $firstName;
    /**
     * @var string|null
     */
    public $lastName;
}
