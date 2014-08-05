<?php namespace Horntell\Errors;

use Exception;
use Horntell\Response;

class Error extends Exception {

	/**
	 * The error code
	 * 
	 * @var null|number
	 */
	protected $code;

	/**
	 * The type of error
	 *
	 * @var string|null
	 */
	protected $type;

	/**
	 * The human friendly error message
	 *
	 * @var string
	 */
	protected $message;

	/**
	 * Constructor
	 *
	 * @param string $message
	 * @param number|null $code
	 * @param string|null $type
	 */
	public function __construct($message, $code, $type)
	{
		$this->message = $message;
		$this->code = $code;
		$this->type = $type;
	}

	/**
	 * Gets the type of error
	 *
	 * @return string|null
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * getMessage() and getCode() are final methods on the parent class,
	 * hence there is no need to define them here.
	 */
}