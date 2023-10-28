<?php

use PhacMan\JWT\JWT;

require dirname(__DIR__, 1).'/vendor/autoload.php';

/*
 * Example encode/decode headers
Decoding the JWT headers without verifying the JWT first is NOT recommended, and is not supported by
this library. This is because without verifying the JWT, the header values could have been tampered with.
Any value pulled from an unverified header should be treated as if it could be any string sent in from an
attacker.  If this is something you still want to do in your application for whatever reason, it's possible to
decode the header values manually simply by calling `json_decode` and `base64_decode` on the JWT
header part:
*/

$key = 'example_key';
$payload = [
    'iss' => 'http://example.org',
    'aud' => 'http://example.com',
    'iat' => 1356999524,
    'nbf' => 1357000000
];

$headers = [
    'x-forwarded-for' => 'www.google.com'
];

// Encode headers in the JWT string
$jwt = JWT::encode($payload, $key, 'HS256', null, $headers);

// Decode headers from the JWT string WITHOUT validation
// **IMPORTANT**: This operation is vulnerable to attacks, as the JWT has not yet been verified.
// These headers could be any value sent by an attacker.
list($headersB64, $payloadB64, $sig) = explode('.', $jwt);
$decoded = json_decode(base64_decode($headersB64), true);

print_r($decoded);
