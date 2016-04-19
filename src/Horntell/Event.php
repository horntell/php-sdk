<?php namespace Horntell;

class Event {

	/**
	 * Decodes payload from input
	 * @return array
	 */
	public function fromWebhook()
	{
		return $_POST['horntell_event'];
	}
}
