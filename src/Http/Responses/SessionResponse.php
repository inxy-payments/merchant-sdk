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
    public function __construct(string $redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }
}
