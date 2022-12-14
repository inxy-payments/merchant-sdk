<?php

namespace INXY\Payments\Merchant\Http\Requests\Dto;

use INXY\Payments\Merchant\Interfaces\Arrayable;

class Customer implements Arrayable
{
    private string  $email;
    private ?string $firstName;
    private ?string $lastName;

    /**
     * @param string      $email
     * @param string|null $firstName
     * @param string|null $secondName
     */
    public function __construct(string $email, string $firstName = null, string $secondName = null)
    {
        $this->email     = $email;
        $this->firstName = $firstName;
        $this->lastName  = $secondName;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email'      => $this->email,
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName
        ];
    }
}
