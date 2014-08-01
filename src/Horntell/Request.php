<?php namespace Horntell;

use Horntell\App;
use GuzzleHttp\Client as Guzzle;

class Request {

	protected $client;

	public function __construct()
	{
		$this->client = new Guzzle([
			'base_url' => App::$base,
			'defaults' => [
				'auth' => [App::$key, App::$secret],
				'headers' => ['Accept' => 'application/vnd.horntell.' . App::$version . '+json']
			]
		]);
	}

	public function send($method, $endpoint, $data = [])
	{
		$request = $this->client->createRequest($method, $endpoint, $data);
		return $this->client->send($request);
	}
}