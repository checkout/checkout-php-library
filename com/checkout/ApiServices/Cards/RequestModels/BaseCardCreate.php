<?php

namespace com\checkout\ApiServices\Cards\RequestModels;

class BaseCardCreate extends BaseCard
{
	protected $_number;
	protected $_cvv;

	/**
	 * @return mixed
	 */
	public function getNumber ()
	{
		return $this->_number;
	}

	/**
	 * @param mixed $number
	 */
	public function setNumber ( $number )
	{
		$this->_number = $number;
	}

	/**
	 * @return mixed
	 */
	public function getCvv ()
	{
		return $this->_cvv;
	}

	/**
	 * @param mixed $cvv
	 */
	public function setCvv ( $cvv )
	{
		$this->_cvv = $cvv;
	}
}