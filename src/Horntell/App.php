<?php namespace Horntell;

abstract class App {

	/**
	 * The app's key to authenticate the API requests
	 * 
	 * @var string
	 */
	public static $key;

	/**
	 * The app's secret to authenticate the API requests
	 * 
	 * @var string
	 */
	public static $secret;

	/**
	 * The base URL for Horntell API
	 * 
	 * @var string
	 */
	public static $base = 'http://api.horntell.com';

	/**
	 * The version of API to use
	 * 
	 * @var string
	 */
	public static $version = 'v1';

	/**
	 * Boots the app using key and secret
	 * 
	 * @param  string $key
	 * @param  string $secret
	 * @return void
	 */
	public function init($key, $secret)
	{
		self::$key = $key;
		self::$secret = $secret;
	}

	/**
	 * Returns the app's key
	 * 
	 * @return string
	 */
	public function getKey()
	{
		return self::$key;
	}

	/**
	 * Returns the app's secret
	 * 
	 * @return string
	 */
	public function getSecret()
	{
		return self::$secret;
	}

	/**
	 * Returns the base URL for API
	 * 
	 * @return string
	 */
	public function getBase()
	{
		return self::$base;
	}

	/**
	 * Returns the API version to use
	 * 
	 * @return string
	 */
	public function getVersion()
	{
		return self::$version;
	}
}