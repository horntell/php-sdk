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
	 * Gets the parsed JSON body
	 *
	 * @return array|null (Null in case of No Content)
	 */
	public function getBody()
	{
		return $this->body;
	}
}