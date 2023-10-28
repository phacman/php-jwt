<?php

use PhacMan\JWT\JWT;
use PhacMan\JWT\CachedKeySet;

require dirname(__DIR__, 1).'/vendor/autoload.php';

/*
The `CachedKeySet` class can be used to fetch and cache JWKS (JSON Web Key Sets) from a public URI.
This has the following advantages:

1. The results are cached for performance.
2. If an unrecognized key is requested, the cache is refreshed, to accomodate for key rotation.
3. If rate limiting is enabled, the JWKS URI will not make more than 10 requests a second.
*/

// The URI for the JWKS you wish to cache the results from
$jwksUri = 'https://www.gstatic.com/iap/verify/public_key-jwk';

// Create an HTTP client (can be any PSR-7 compatible HTTP client)
$httpClient = new GuzzleHttp\Client();

// Create an HTTP request factory (can be any PSR-17 compatible HTTP request factory)
$httpFactory = new GuzzleHttp\Psr\HttpFactory();

// Create a cache item pool (can be any PSR-6 compatible cache item pool)
$cacheItemPool = Phpfastcache\CacheManager::getInstance('files');

$keySet = new CachedKeySet(
    $jwksUri,
    $httpClient,
    $httpFactory,
    $cacheItemPool,
    null, // $expiresAfter int seconds to set the JWKS to expire
    true  // $rateLimit    true to enable rate limit of 10 RPS on lookup of invalid keys
);

$jwt = 'eyJhbGci...'; // Some JWT signed by a key from the $jwkUri above
$decoded = JWT::decode($jwt, $keySet);
