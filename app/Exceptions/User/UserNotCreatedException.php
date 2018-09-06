<?php

namespace App\Exceptions\User;

use Exception;
use App\Exceptions\IsAPIException;

class UserNotCreatedException extends Exception implements IsAPIException
{
    private $httpStatusCode = 400;

    public function __construct(string $message = "User Not Created", int $code = 399, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    public function setHttpStatusCode(int $httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}