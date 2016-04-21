<?php namespace Horntell;

class Card {

	const DEFAULT_CANVAS = 'default';

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
		$card['canvas'] = isset($card['canvas']) ? $card['canvas'] : self::DEFAULT_CANVAS;

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

		$card['canvas'] = isset($card['canvas']) ? $card['canvas'] : self::DEFAULT_CANVAS;

		return $this->request->send('POST', "/profiles/cards", $card);
	}


	/**
	 * Sends a card to a channel
	 *
	 * @param  string $uid
	 * @param  array $card
	 * @return Horntell\Http\Response
	 */
	public function toChannel($uid, $card)
	{
		$card['canvas'] = isset($card['canvas']) ? $card['canvas'] : self::DEFAULT_CANVAS;

		return $this->request->send('POST', "/channels/$uid/cards", $card);
	}

	/**
	 * Sends a card to a multiple channels
	 *
	 * @param  array $card
	 * @return Horntell\Http\Response
	 */
	public function toChannels($channels, $card)
	{
		$card = array_merge(['channel_uids' => $channels], $card);

		$card['canvas'] = isset($card['canvas']) ? $card['canvas'] : self::DEFAULT_CANVAS;

		return $this->request->send('POST', "/channels/cards", $card);
	}

}