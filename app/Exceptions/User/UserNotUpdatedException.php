<?php

namespace App\Exceptions\User;


use App\Exceptions\IsAPIException;

class UserNotUpdatedException extends \Exception implements IsAPIException
{
    protected $httpStatusCode = 400;

    public function __construct(string $message = "User not updated.", int $code = 398, Throwable $previous = null)
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