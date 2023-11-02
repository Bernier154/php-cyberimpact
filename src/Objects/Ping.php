<?php

namespace bernier154\PhpCyberimpact\Objects;

/**
 * Result of a PingRequest.
 */
class Ping
{
    public $ping;
    public $username;
    public $email;
    public $account;
    const SUCCESS = 'success';
    const FAILURE = 'failure';

    public function __construct($ping,  $username = null,  $email = null,  $account = null)
    {
        $this->ping = $ping;
        $this->username = $username;
        $this->email = $email;
        $this->account = $account;
    }

    public function isSuccessful()
    {
        return $this->ping == self::SUCCESS;
    }
}
