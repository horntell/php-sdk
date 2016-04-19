Horntell SDK for PHP
====================

This SDK allows you to easily integrate Horntell in your PHP applications.

## Requirements

**PHP 5.4 and later.**

*However, there's nothing (yet!) that lower version cannot do, but we don't want to support <=5.3 because it will be a thing of past very soon (or is it already?). Going forward, we can make use of some of 5.4 features like Traits, which has ability to provide more beautiful API than what 5.3 can.*

**Guzzle**

This package depends on Guzzle HTTP client, which has the following additional requirements.
- To use the PHP stream adapter, `allow_url_fopen` must be enabled in your system's `php.ini`.
- To use the cURL adapter, you must have a recent version of cURL >= 7.16.2 compiled with OpenSSL and zlib.

## Installation

You can install the SDK using Composer. Add this to your `composer.json` file. (Or use `dev-master` for nightly builds).

```json
{
	"require": {
		"horntell/php-sdk": "0.3.*"
	}
}
```

Then, pull the package using the following command:

	composer install

You will need to include the Composer's autoloader. Simply put this statement in the file you want to use the package.

	require 'vendor/autoload.php';

## Getting Started

You need to `init`ialize the SDK with the app's key and secret, which you can find in your account at [http://app.horntell.com](http://app.horntell.com). Sample usage looks like this.

```php
Horntell\App::init('YOUR_APP_KEY', 'YOUR_APP_SECRET');
(new Horntell\Profile)->create(array(
	'uid' => '1337',
	'first_name' => 'John',
	'last_name' => 'Doe',
	'signedup_at' => 1383350400
));
```

## Documentation

Please see [http://docs.horntell.com/api](http://docs.horntell.com/api/?php) for up-to-date documentation.

## Laravel

The composer package to work easily with Laravel will be available soon.
