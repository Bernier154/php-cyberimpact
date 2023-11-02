<?php

namespace bernier154\PhpCyberimpact\Objects;

/**
 * Result of a TokenRequest.
 */
class Token
{
    public $tokenUniqueId;
    public $token;
    public $expiration;


    /**
     * __construct
     *
     * @param  string $tokenUniqueId The unique ID of the token
     * @param  string $token The access token to use; 
     * @param  string $expiration The expiration date of the token
     * @return void
     */
    public function __construct($tokenUniqueId,  $token,  $expiration)
    {
        $this->tokenUniqueId = $tokenUniqueId;
        $this->token = $token;
        $this->expiration = $expiration;
    }
}
