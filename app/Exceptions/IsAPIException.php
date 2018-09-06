<?php

namespace App\Exceptions;


interface IsAPIException
{
    public function setHttpStatusCode(int $httpStatusCode);

    public function getHttpStatusCode();

    public function getMessage();

    public function setMessage(string $message);
}