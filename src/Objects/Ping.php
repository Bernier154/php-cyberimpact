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

    public function __construct(string $ping, string $username = null, string $email = null, string $account = null)
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
