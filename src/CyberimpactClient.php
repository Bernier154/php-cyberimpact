<?php

namespace bernier154\PhpCyberimpact;

use bernier154\PhpCyberimpact\ApiRequests\BatchRequests;
use bernier154\PhpCyberimpact\ApiRequests\GroupRequests;
use bernier154\PhpCyberimpact\ApiRequests\MailingRequests;
use bernier154\PhpCyberimpact\ApiRequests\MemberRequests;
use bernier154\PhpCyberimpact\ApiRequests\PingRequest;
use bernier154\PhpCyberimpact\ApiRequests\TemplateRequests;
use bernier154\PhpCyberimpact\ApiRequests\TokenRequest;
use bernier154\PhpCyberimpact\Exceptions\ApiException;
use GuzzleHttp\Client;

class CyberimpactClient
{
    use PingRequest, TokenRequest, GroupRequests, MemberRequests, MailingRequests, TemplateRequests, BatchRequests;
    const CYBERIMPACT_API_URL = 'https://api.cyberimpact.com/';
    private $apiToken;

    /**
     * Create an instance of {CyberimpactClient}
     *
     * @param  string $apiToken The Cyberimpact api token
     * @return void
     */
    public function __construct(string $apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * Launch a request to the Cyberimpact api
     *
     * @param  string $method The http method of the request
     * @param  string $route The route of the request
     * @param  ?array $data If applicable, the JSON or URLParams of the request as an associative array.
     * @return object
     */
    private function _request($method,  $route,  $data = null)
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
