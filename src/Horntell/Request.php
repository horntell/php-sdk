<?php namespace Horntell;

use Horntell\App;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;

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
			return $this->client->send($request);
		}
		catch(GuzzleRequestException $e)
		{
			return $e->getResponse();
		}
	}
}