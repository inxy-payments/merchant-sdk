<?php

namespace INXY\Payments\Merchant\Http\Responses;

class SessionResponse
{
    /**
     * @var string
     */
    private $redirectUri;

    /**
     * @param string $redirectUri
     */
    public function __construct($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
}
