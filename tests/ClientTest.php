<?php

namespace bernier154\PhpCyberimpact\tests;

use bernier154\PhpCyberimpact\CyberimpactClient;
use bernier154\PhpCyberimpact\Exceptions\ValidationException;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

final class ClientTest extends TestCase
{
    /**
     * @covers CyberimpactClient::__construct()
     */
    public function testGetClientWithoutApiToken()
    {
        $this->expectException(ValidationException::class);
        $client = new CyberimpactClient([]);
    }

    /**
     * @covers CyberimpactClient::__construct()
     */
    public function testGetClientWithApiToken()
    {
        $client = new CyberimpactClient(['apiToken' => $_ENV['api_key']]);
        $this->assertInstanceOf(CyberimpactClient::class, $client);
    }

    /**
     * @covers CyberimpactClient::_request()
     * @covers CyberimpactClient::ping()
     */
    public function testRequest()
    {
        $client = new CyberimpactClient(['apiToken' => $_ENV['api_key']]);
        $response = $client->ping();
        assertEquals('success', $response->ping);
    }
}
