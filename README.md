# JWT Compact Version

A simple library to encode and decode JSON Web Tokens (JWT) in PHP, conforming to [RFC 7519](https://tools.ietf.org/html/rfc7519).

## Getting Started
- base: [docs/qa-base.php](docs/qa-base.php)
- headers: [docs/qa-headers.php](docs/qa-headers.php)
- openssl: [docs/qa-openssl.php](docs/qa-openssl.php)
- passphrase: [docs/qa-passphrase.php](docs/qa-passphrase.php)
- EdDSA: [docs/qa-eddsa.php](docs/qa-eddsa.php)
- multiple keys: [docs/qa-multiple.php](docs/qa-multiple.php)
- JWKs: [docs/qa-jwks.php](docs/qa-jwks.php)
- cached: [docs/qa-cached.php](docs/qa-cached.php)
- exception: [docs/qa-exception.php](docs/qa-exception.php)
- casting to array: [docs/qa-casting.php](docs/qa-casting.php)


### New Lines in private keys
If your private key contains `\n` characters, be sure to wrap it in double quotes `""`
and not single quotes `''` in order to properly interpret the escaped characters.

### License
[3-Clause BSD](http://opensource.org/licenses/BSD-3-Clause).

### Resources
* Original repository: https://github.com/symfony/dotenv
