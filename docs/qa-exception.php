<?php

use PhacMan\JWT\JWT;
use PhacMan\JWT\SignatureInvalidException;
use PhacMan\JWT\BeforeValidException;
use PhacMan\JWT\ExpiredException;
use DomainException;
use InvalidArgumentException;
use UnexpectedValueException;

require dirname(__DIR__, 1).'/vendor/autoload.php';

try {
    $decoded = JWT::decode($payload, $keys);
} catch (InvalidArgumentException $e) {
    // provided key/key-array is empty or malformed.
} catch (DomainException $e) {
    // provided algorithm is unsupported OR
    // provided key is invalid OR
    // unknown error thrown in openSSL or libsodium OR
    // libsodium is required but not available.
} catch (SignatureInvalidException $e) {
    // provided JWT signature verification failed.
} catch (BeforeValidException $e) {
    // provided JWT is trying to be used before "nbf" claim OR
    // provided JWT is trying to be used before "iat" claim.
} catch (ExpiredException $e) {
    // provided JWT is trying to be used after "exp" claim.
} catch (UnexpectedValueException $e) {
    // provided JWT is malformed OR
    // provided JWT is missing an algorithm / using an unsupported algorithm OR
    // provided JWT algorithm does not match provided key OR
    // provided key ID in key/key-array is empty or invalid.
}

/*
All exceptions in the `Firebase\JWT` namespace extend `UnexpectedValueException`, and can be simplified
like this:
*/

try {
    $decoded = JWT::decode($payload, $keys);
} catch (LogicException $e) {
    // errors having to do with environmental setup or malformed JWT Keys
} catch (UnexpectedValueException $e) {
    // errors having to do with JWT signature and claims
}
