<?php namespace Horntell;

class Event {

	/**
	 * Decodes payload from input
	 * 
	 * @return array
	 */
	public function fromWebhook()
	{
		return json_decode($_POST['horntell_event'], true);
	}
}
