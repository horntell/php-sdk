<?php namespace Horntell;

class Activity {

	protected $request;

	public function __construct()
	{
		$this->request = new Request;
	}

	public function create($uid, $activity)
	{
		return $this->request->send('POST', "/profiles/$uid/activities", $activity);
	}
}