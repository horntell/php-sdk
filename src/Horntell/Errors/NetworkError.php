<?php namespace Horntell\Errors;

class NetworkError extends Error {

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->message = "Could not connect to Horntell. Please check your network connection and try again. If the problem persists, please get in touch with us at hello@horntell.com.";
		$this->type = 'network_error';
	}
}