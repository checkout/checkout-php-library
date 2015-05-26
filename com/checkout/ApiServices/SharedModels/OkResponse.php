<?php
namespace com\checkout\ApiServices\SharedModels;


class OkResponse
{
	protected $_message;

	/**
	 * @return mixed
	 */
	public function getMessage ()
	{
		return $this->_message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage ( $message )
	{
		$this->_message = $message;
	}
}