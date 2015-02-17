<?php namespace Horntell;

class Horn {

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
	 * Sends a horn to a profile
	 *
	 * @param  string $uid
	 * @param  array $horn
	 * @return Horntell\Http\Response
	 */
	public function toProfile($uid, $horn)
	{
		return $this->request->send('POST', "/profiles/$uid/horns", $horn);
	}

	/**
	 * Sends a horn to a multiple profiles
	 *
	 * @param  array $horn
	 * @return Horntell\Http\Response
	 */
	public function toProfiles($profiles, $horn)
	{
		$horn = array_merge(['profile_uids' => $profiles], $horn);

		return $this->request->send('POST', "/profiles/horns", $horn);
	}

}