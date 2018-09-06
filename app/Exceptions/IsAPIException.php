<?php

namespace App\Exceptions;


/**
 * Interface IsAPIException
 *
 * This interface is created to help
 * handle interactions with exceptions
 * when thrown from API.
 *
 * @package App\Exceptions
 */
interface IsAPIException
{
    public function setHttpStatusCode(int $httpStatusCode);

    public function getHttpStatusCode();

    public function getMessage();

    public function setMessage(string $message);
}