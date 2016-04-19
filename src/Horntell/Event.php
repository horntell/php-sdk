<?php namespace Horntell;

class Event {

	/**
	 * decodes payload from input
	 * @return Decoded Payload From Webhook
	 */
	public function fromWebhook()
	{
		return $_POST['horntell_event'];
	}
}