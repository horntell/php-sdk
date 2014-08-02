<?php namespace Horntell;

use Horntell\Request;

class Profile {

	protected $request;

	public function __construct()
	{
		$this->request = new Request;
	}

	public function find($uid)
	{
		return $this->request->send('GET', "/profiles/$uid");
	}

	public function create($profile)
	{
		return $this->request->send('POST', '/profiles', $profile);
	}
}