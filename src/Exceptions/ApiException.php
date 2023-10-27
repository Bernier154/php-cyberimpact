<?php

namespace bernier154\PhpCyberimpact\Exceptions;


class ApiException extends \Exception
{
    private $apiErrors;
    public function __construct(string $message, int $code = 0, \Throwable $previous = null, array $apiErrors = [])
    {
        $this->apiErrors = $apiErrors;
        parent::__construct($message, $code, $previous);
    }

    public function getApiErrors()
    {
        return $this->apiErrors;
    }

    static function fromApiResponse($apiResponse)
    {
        $body = json_decode($apiResponse->getBody());
        $message = isset($body->message) ? $body->message : '';
        $apiErrors = isset($body->errors) ? (array) $body->errors : [];

        if ($apiResponse->getStatusCode() == 401) { // It is the bad authentication error code, let's orverride it to make it clearer
            $message = "Invalid Api token.";
        }


        return new Self($message, $apiResponse->getStatusCode(), null, $apiErrors);
    }
}
