<?php namespace Horntell\Http;

use Horntell\App, Horntell\Errors;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception as GuzzleExceptions;

class Request {

	/**
	 * Instance of HTTP Client (Guzzle)
	 *
	 * @var GuzzleHttp\Client
	 */
	protected $client;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->client = new Guzzle([

			// The base url from the Horntell\App class
			'base_url' => App::$base,

			// Defaults required to make the API requests work
			'defaults' => [
				'auth' => [App::$key, App::$secret],
				'headers' => [
					'Accept' => 'application/vnd.horntell.' . App::$version . '+json',
					'Content-Type' => 'application/json'
				]
			]
		]);
	}

	/**
	 * Wraps HTTP call into a good mould
	 *
	 * @param  string $method
	 * @param  string $endpoint
	 * @param  array $data
	 * @return Horntell\Http\Response
	 * @throws Horntell\Errors\*
	 */
	public function send($method, $endpoint, $data = [])
	{
		try
		{
			$request = $this->client->createRequest($method, $endpoint, ['body' => json_encode($data)]);
			return new Response($this->client->send($request));
		}
		catch(GuzzleExceptions\RequestException $e)
		{
			// pass the exception to a helper method,
			// which will figure our what kind of 
			// exception to throw
			return $this->handleError($e);
		}
	}

	/**
	 * Handles the error by throwing proper exception
	 *
	 * @param  GuzzleHttp\Exception\RequestException $e
	 * @return null
	 * @throws Horntell\Errors\NetworkError If original exception has no response attached to it
	 * @throws Horntell\Errors\InvalidRequestException If HTTP Status Code is 400
	 * @throws Horntell\Errors\AuthenticationException If HTTP Status Code is 401
	 * @throws Horntell\Errors\ForbiddenException If HTTP Status Code is 403
	 * @throws Horntell\Errors\NotFoundException If HTTP Status Code is 404
	 * @throws Horntell\Errors\ServiceException If HTTP Status Code is 500
	 */
	private function handleError($e)
	{
		// if there's no response attached to the exception,
		// we will assume that the request was never sent and
		// thus will throw a network error
		if( ! $e->hasResponse())
		{
			throw new Errors\NetworkError;
		}

		// if there's a response attached to the exception,
		// we will figure out which error to throw based on
		// the HTTP status code of response
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

			// for backwards compatibility, we will handle other
			// HTTP status codes too (to keep the SDK working,
			// even when we send more variants of HTTP status codes
			// through API)
			default:
				return $this->handleUnknownError($e);
		}
	}

	/**
	 * Handles unknown errors by checking the kind of HTTP status code
	 *
	 * @param  GuzzleHttp\Exception\RequestException $e
	 * @return null
	 * @throws Horntell\Errors\InvalidRequestError If HTTP Status Code is 4xx
	 * @throws Horntell\Errors\ServiceError If HTTP Status Code is 5xx
	 * @throws Horntell\Errors\Error If HTTP Status Code is other than 4xx and 5xx
	 */
	private function handleUnknownError($e)
	{
		$response = $e->getResponse();
		$body = $response->json();

		// switching on the first number of status code
		// we are using floor to round off to the lower end
		// eg. floor(404 / 100) == 4
		switch(floor($response->getStatusCode() / 100))
		{
			// client error (4xx)
			case 4:
				throw new Errors\InvalidRequestError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			// server error (5xx)
			case 5:
				throw new Errors\ServiceError($body['error']['message'], $body['error']['code'], $body['error']['type']);
				break;

			// very generic error (if all else fails)
			default:
				throw new Errors\Error($body['error']['message'], $body['error']['code'], $body['error']['type']);
		}
	}
}