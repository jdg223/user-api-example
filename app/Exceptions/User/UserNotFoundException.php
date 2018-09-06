<?php

namespace App\Exceptions\User;


use App\Exceptions\IsAPIException;
use Throwable;

class UserNotFoundException extends \Exception implements IsAPIException
{
    private $httpStatusCode = 404;

    public function __construct(string $message = "User not found.", int $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    public function setHttpStatusCode(int $httpStatusCode)
    {
        return $this->httpStatusCode;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }
}