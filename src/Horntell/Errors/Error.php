<?php namespace Horntell\Errors;

use Exception;
use Horntell\Response;

class Error extends Exception {

	protected $code;

	protected $type;

	protected $message;

	public function __construct($message, $code, $type)
	{
		$this->message = $message;
		$this->code = $code;
		$this->type = $type;
	}

	public function getType()
	{
		return $this->type;
	}
}