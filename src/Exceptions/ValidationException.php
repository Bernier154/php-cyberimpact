<?php

namespace bernier154\PhpCyberimpact\Exceptions;


class ValidationException extends \Exception
{
    public function __construct($message,  $code = 0,  $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
