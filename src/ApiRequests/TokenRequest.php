<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\Token;

trait TokenRequest
{
    /**
     * Generate a token that will be associated to your account and be used to call this API.
     *
     * @return Token
     */
    function generateToken()
    {
        try {
            $apiResponse = $this->_request('POST', 'tokens');
            return new Token($apiResponse->tokenUniqueId, $apiResponse->token, $apiResponse->expiration);
        } catch (ApiException $e) {
            throw ($e);
        }
    }
}
