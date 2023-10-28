<?php

use PhacMan\JWT\JWT;
use PhacMan\JWT\Key;

require dirname(__DIR__, 1).'/vendor/autoload.php';

// Public and private keys are expected to be Base64 encoded. The last
// non-empty line is used so that keys can be generated with
// sodium_crypto_sign_keypair(). The secret keys generated by other tools may
// need to be adjusted to match the input expected by libsodium.

$keyPair = sodium_crypto_sign_keypair();

$privateKey = base64_encode(sodium_crypto_sign_secretkey($keyPair));

$publicKey = base64_encode(sodium_crypto_sign_publickey($keyPair));

$payload = [
    'iss' => 'example.org',
    'aud' => 'example.com',
    'iat' => 1356999524,
    'nbf' => 1357000000
];

$jwt = JWT::encode($payload, $privateKey, 'EdDSA');
echo "Encode:\n" . print_r($jwt, true) . "\n";

$decoded = JWT::decode($jwt, new Key($publicKey, 'EdDSA'));
echo "Decode:\n" . print_r((array) $decoded, true) . "\n";
