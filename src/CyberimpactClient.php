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
use bernier154\PhpCyberimpact\Exceptions\ValidationException;
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
    public function __construct($args)
    {
        $args = $this->_defaultArgs($args, ['apiToken' => ''], ['apiToken' => 'required|string']);
        $this->apiToken = $args['apiToken'];
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

    private function _defaultArgs($args, $defaults, $validations = [])
    {
        $newArgs = [];
        foreach ($defaults as $defaultKey => $defaultValue) {
            $argValue = isset($args[$defaultKey]) ? $args[$defaultKey] : '__unset__';
            $validation = isset($validations[$defaultKey]) ? explode('|', $validations[$defaultKey]) : null;

            if ($validation !== null) {
                if (in_array("required", $validation)) {
                    if ($argValue == '__unset__') {
                        throw (new ValidationException("Required value: $defaultKey"));
                    }
                }
                if ($argValue !== '__unset__') {
                    if (in_array("int", $validation)) {
                        if (!is_int($argValue)) {
                            throw (new ValidationException("Value must be an integer: $defaultKey"));
                        }
                    }
                    if (in_array("string", $validation)) {
                        if (!is_string($argValue)) {
                            throw (new ValidationException("Value must be a string: $defaultKey"));
                        }
                    }
                    if (in_array("non_nullable", $validation)) {
                        if ($argValue === null) {
                            throw (new ValidationException("Value must not be NULL: $defaultKey"));
                        }
                    }
                }
            }
            $newArgs[$defaultKey] = $argValue !== '__unset__' ? $argValue : $defaultValue;
        }
        return $newArgs;
    }
}
