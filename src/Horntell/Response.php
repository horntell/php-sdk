<?php namespace Horntell;

class Response {

	protected $response;

	protected $body;

	public function __construct($response)
	{
		$this->response = $response;
		$this->body = $this->response->json();
	}

	public function getBody()
	{
		return $this->body;
	}
}