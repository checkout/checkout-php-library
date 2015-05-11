<?php

namespace com\checkout\ApiServices\SharedModels;


class ShippingAddress extends Address
{
	protected $_recipientName;

	/**
	 * @return mixed
	 */
	public function getRecipientName ()
	{
		return $this->_recipientName;
	}

	/**
	 * @param mixed $recipientName
	 */
	public function setRecipientName ( $recipientName )
	{
		$this->_recipientName = $recipientName;
	}
}