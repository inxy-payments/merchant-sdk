<?php

namespace INXY\Payments\Merchant\Http\Requests\Dto;

use INXY\Payments\Merchant\Interfaces\Arrayable;

class Customer implements Arrayable
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string|null
     */
    private $firstName;
    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @param string      $email
     * @param string|null $firstName
     * @param string|null $secondName
     */
    public function __construct($email, $firstName = null, $secondName = null)
    {
        $this->email     = $email;
        $this->firstName = $firstName;
        $this->lastName  = $secondName;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'email'      => $this->email,
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName
        ];
    }
}
