<?php namespace Horntell;

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

	public function update($uid, $profile)
	{
		return $this->request->send('PUT', "/profiles/$uid", $profile);
	}

	public function delete($uid)
	{
		return $this->request->send('DELETE', "/profiles/$uid");
	}
}