<?php namespace Horntell\Http;

class Response {

	/**
	 * Instance of original response from HTTP client
	 *
	 * @var GuzzleHttp\Message\Response
	 */
	protected $response;

	/**
	 * Parsed JSON body
	 *
	 * @var array
	 */
	protected $body;

	/**
	 * Consructor
	 *
	 * @param GuzzleHttp\Message\Response $response
	 */
	public function __construct($response)
	{
		$this->response = $response;
		$this->body = $this->response->json();
	}

	/**
	 * Gets the original response
	 *
	 * @return GuzzleHttp\Message\Response
	 */
	public function getOriginal()
	{
		return $this->response
	}

	/**
	 * Gets the parsed JSON body
	 *
	 * @return array|null (Null in case of No Content)
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Gets the HTTP Status Code
	 *
	 * @return number
	 */
	public function getStatusCode()
	{
		return $this->response->getStatusCode();
	}
}