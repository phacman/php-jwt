<?php

declare(strict_types=1);

namespace PhacMan\JWT;

use UnexpectedValueException;

class BeforeValidException extends UnexpectedValueException implements JWTExceptionWithPayloadInterface
{
    private object $payload;

    public function setPayload(object $payload) : void
    {
        $this->payload = $payload;
    }

    public function getPayload() : object
    {
        return $this->payload;
    }
}
