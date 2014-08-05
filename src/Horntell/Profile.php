<?php namespace Horntell;

class Profile {

	/**
	 * Instance of Request class
	 *
	 * @var Horntell\Http\Request
	 */
	protected $request;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->request = new Http\Request;
	}

	/**
	 * Finds a profile by its uid
	 *
	 * @param  string $uid
	 * @return Horntell\Http\Response
	 */
	public function find($uid)
	{
		return $this->request->send('GET', "/profiles/$uid");
	}

	/**
	 * Creates a new profile
	 *
	 * @param  array $profile
	 * @return Horntell\Http\Response
	 */
	public function create($profile)
	{
		return $this->request->send('POST', '/profiles', $profile);
	}

	/**
	 * Updates a profile using its uid
	 *
	 * @param  string $uid
	 * @param  array $profile
	 * @return Horntell\Http\Response
	 */
	public function update($uid, $profile)
	{
		return $this->request->send('PUT', "/profiles/$uid", $profile);
	}

	/**
	 * Deletes a profile using its uid
	 *
	 * @param  string $uid
	 * @return Horntell\Http\Response
	 */
	public function delete($uid)
	{
		return $this->request->send('DELETE', "/profiles/$uid");
	}
}