<?php namespace Horntell;

class Activity {

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
	 * Creates a new activity for a profile
	 *
	 * @param  string $uid
	 * @param  array $activity
	 * @return Horntell\Http\Response
	 */
	public function create($uid, $activity)
	{
		return $this->request->send('POST', "/profiles/$uid/activities", $activity);
	}
}