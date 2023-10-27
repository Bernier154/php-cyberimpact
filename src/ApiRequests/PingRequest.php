<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\Ping;

trait PingRequest
{
    /**
     * Simple function to verify your connection with the API.
     *
     * @return Ping
     */
    function ping()
    {
        try {
            $apiResponse = $this->_request('GET', 'ping');
            return new Ping($apiResponse->ping, $apiResponse->username, $apiResponse->email, $apiResponse->account);
        } catch (ApiException $e) {
            return new Ping(PING::FAILURE, null, null, null);
        }
    }
}
