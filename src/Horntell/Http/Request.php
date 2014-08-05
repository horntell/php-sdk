<?php namespace Horntell\Http;

use Horntell\App, Horntell\Errors;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception as GuzzleExceptions;

class Request {

	protected $client;

	public function __construct()
	{
		$this->client = new Guzzle([
			'base_url' => App::$base,
			'defaults' => [
				'auth' => [App::$key, App::$secret],
				'headers' => [
					'Accept' => 'application/vnd.horntell.' . App::$version . '+json',
					'Content-Type' => 'application/json'
				]
			]
		]);
	}

	public function send($method, $endpoint, $data = [])
	{
		try
		{
			$request = $this->client->createRequest($method, $endpoint, ['body' => json_encode($data)]);
			return new Response($this->client->send($request));
		}
		catch(GuzzleExceptions\RequestException $e)
		{
			return $this->handleError($e);
		}
	}

	private function handleError($e)
	{
		if( ! $e->hasResponse())
		{
			throw new Errors\NetworkError;
		}

		$response = $e->getResponse();
		$body = $response->json();
		switch($response->getStatusCode())
		{
			case 400:
				throw new Errors\InvalidRequestError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			case 401:
				throw new Errors\AuthenticationError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;
				
			case 403:
				throw new Errors\ForbiddenError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			case 404:
				throw new Errors\NotFoundError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			case 500:
				throw new Errors\ServiceError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			default:
				return $this->handleUnknownError($e);
		}
	}

	private function handleUnknownError($e)
	{
		$response = $e->getResponse();
		$body = $response->json();

		// we are using floor to round off to the lower end
		// eg. floor(420 / 100) === 4
		switch(floor($response->getStatusCode() / 100))
		{
			// client error
			case 4:
				throw new Errors\InvalidRequestError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			// server error
			case 5:
				throw new Errors\ServiceError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			// very generic error
			default:
				throw new Errors\Error($body['error']['message'], $body['error']['code'], $body['error']['type']);
		}
	}
}