<?php

namespace bernier154\PhpCyberimpact;

use bernier154\PhpCyberimpact\ApiRequests\GroupRequests;
use bernier154\PhpCyberimpact\ApiRequests\PingRequest;
use bernier154\PhpCyberimpact\ApiRequests\TokenRequest;
use bernier154\PhpCyberimpact\Exceptions\ApiException;
use GuzzleHttp\Client;

class CyberimpactClient
{
    use PingRequest, TokenRequest, GroupRequests;
    const CYBERIMPACT_API_URL = 'https://api.cyberimpact.com/';
    private $throwRetrieve = false;
    private $apiToken;

    /**
     * Create an instance of {CyberimpactClient}
     *
     * @param  string $apiToken The Cyberimpact api token
     * @param  boolean $throwRetrieve if true, the retreiveById api calls (response 404), will throw and exception.
     * @return void
     */
    public function __construct(string $apiToken, $throwRetrieve = false)
    {
        $this->apiToken = $apiToken;
        $this->throwRetrieve = $throwRetrieve;
    }

    /**
     * Launch a request to the Cyberimpact api
     *
     * @param  string $method The http method of the request
     * @param  string $route The route of the request
     * @param  ?array $data If applicable, the JSON or URLParams of the request as an associative array.
     * @return object
     */
    private function _request(string $method, string $route, array $data = null)
    {
        $client = new Client();
        $urlParams = "";

        $request = [
            'http_errors' => false, // we'll catch the errors manually
            "headers" => [
                "Authorization" => "Bearer " . $this->apiToken
            ]
        ];

        if ($data !== null && in_array($method, ['GET'])) {
            $urlParams = "?" . http_build_query($data);
        } else if ($data !== null) {
            $request['json'] = $data; // Automatically set the content-type header and encode the array
        }

        $apiResponse = $client->request($method, self::CYBERIMPACT_API_URL . $route . $urlParams, $request);

        if (!in_array($apiResponse->getStatusCode(), [200, 201])) {  // If not successful, we have a problem
            throw ApiException::fromApiResponse($apiResponse);
        }

        return json_decode($apiResponse->getBody());
    }
}
