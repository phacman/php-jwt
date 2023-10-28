<?php

use PhacMan\JWT\JWK;
use PhacMan\JWT\JWT;

require dirname(__DIR__, 1).'/vendor/autoload.php';

// Set of keys. The "keys" key is required. For example, the JSON response to
// this endpoint: https://www.gstatic.com/iap/verify/public_key-jwk
$jwks = ['keys' => []];
$payload = '...';

// JWK::parseKeySet($jwks) returns an associative array of **kid** to Firebase\JWT\Key
// objects. Pass this as the second parameter to JWT::decode.
JWT::decode($payload, JWK::parseKeySet($jwks));
