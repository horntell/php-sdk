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
}