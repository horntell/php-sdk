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
	 * Triggers campaign for single profile
	 *
	 * @param  string $uid
	 * @param  string $campaignId
	 * @param  array $meta
	 * @return Horntell\Http\Response
	 */
	public function toProfile($uid, $campaignId, $meta = [])
	{
		return $this->request->send('POST', "profiles/$uid/campaigns/$campaignId", ['meta' => $meta]);
	}

	/**
	 * Triggers campaign for multiple profiles
	 *
	 * @param  array  $profiles
	 * @param  string $campaignId
	 * @param  array  $meta
	 * @return Horntell\Http\Response
	 */
	public function toProfiles($profiles, $campaignId, $meta = [])
	{
		$data = ['profile_uids' => $profiles, 'meta' => $meta];

		return $this->request->send('POST', "profiles/campaigns/$campaignId", $data);
	}

	/**
	 * Triggers campaign for single channel
	 *
	 * @param  array  $channel
	 * @param  string $campaignId
	 * @param  array  $meta
	 * @return Horntell\Http\Response
	 */
	public function toChannel($channel, $campaignId, $meta = [])
	{
		return $this->request->send('POST', "channels/$uid/campaigns/$campaignId", ['meta' => $meta]);
	}

}