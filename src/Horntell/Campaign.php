<?php namespace Horntell;

class Campaign {

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
	 * [Triggers campaign for single profile]
	 * @param  string $uid
	 * @param  string $campaignId
	 * @return Horntell\Http\Response
	 */
	public function toProfile($uid, $campaignId)
	{
		return $this->request->send('POST', "profiles/$uid/campaigns/$campaignId");
	}

	/**
	 * [Triggers campaign for multiple profiles]
	 * @param  array  $profiles
	 * @param  string $campaignId
	 * @return Horntell\Http\Response
	 */
	public function toProfiles($profiles, $campaignId)
	{
		$profiles = ['profile_uids' => $profiles];

		return $this->request->send('POST', "profiles/campaigns/$campaignId", $profiles);
	}

}