<?php namespace Horntell;

class Card {

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
	 * Sends a card to a profile
	 *
	 * @param  string $uid
	 * @param  array $card
	 * @return Horntell\Http\Response
	 */
	public function toProfile($uid, $card)
	{
		return $this->request->send('POST', "/profiles/$uid/cards", $card);
	}

	/**
	 * Sends a card to a multiple profiles
	 *
	 * @param  array $card
	 * @return Horntell\Http\Response
	 */
	public function toProfiles($profiles, $card)
	{
		$card = array_merge(['profile_uids' => $profiles], $card);

		return $this->request->send('POST', "/profiles/cards", $card);
	}

}