<?php

use PhacMan\JWT\JWT;

require dirname(__DIR__, 1).'/vendor/autoload.php';

/*
The return value of `JWT::decode` is the generic PHP object `stdClass`. If you'd like to handle with arrays
instead, you can do the following:
*/

// return type is stdClass
$decoded = JWT::decode($payload, $keys);

// cast to array
$decoded = json_decode(json_encode($decoded), true);
