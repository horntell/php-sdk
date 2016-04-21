<?php namespace Horntell;

class Event {

	/**
	 * decodes payload from input
	 * @return Decoded Payload From Webhook
	 */
	public function fromWebhook()
	{
		return $_POST['horntell_event'];
		// return json_decode($_POST['horntell_event'], true);
	}
}