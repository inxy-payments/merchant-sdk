<?php

namespace INXY\Payments\Merchant\Webhooks\Dto;

class Customer
{
    public string  $id;
    public string  $object;
    public string  $email;
    public ?string $firstName = null;
    public ?string $lastName  = null;
}
