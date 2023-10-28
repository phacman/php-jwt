<?php

use PhacMan\JWT\JWT;
use PhacMan\JWT\Key;

require dirname(__DIR__, 1).'/vendor/autoload.php';

// Example RSA keys from previous example
$privateKey1 = '...';
$publicKey1 = '...';

// Example EdDSA keys from previous example
$privateKey2 = '...';
$publicKey2 = '...';

$payload = [
    'iss' => 'example.org',
    'aud' => 'example.com',
    'iat' => 1356999524,
    'nbf' => 1357000000
];

$jwt1 = JWT::encode($payload, $privateKey1, 'RS256', 'kid1');
$jwt2 = JWT::encode($payload, $privateKey2, 'EdDSA', 'kid2');
echo "Encode 1:\n" . print_r($jwt1, true) . "\n";
echo "Encode 2:\n" . print_r($jwt2, true) . "\n";

$keys = [
    'kid1' => new Key($publicKey1, 'RS256'),
    'kid2' => new Key($publicKey2, 'EdDSA'),
];

$decoded1 = JWT::decode($jwt1, $keys);
$decoded2 = JWT::decode($jwt2, $keys);

echo "Decode 1:\n" . print_r((array) $decoded1, true) . "\n";
echo "Decode 2:\n" . print_r((array) $decoded2, true) . "\n";
