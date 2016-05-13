<?php

namespace com\checkout\ApiServices\SharedModels;


class Descriptor
{
	protected $_name;
	protected $_city;

	/**
	 * @return mixed
	 */
	public function getName ()
	{
		return $this->_name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName ( $name )
	{
		$this->_name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getCity ()
	{
		return $this->_city;
	}

	/**
	 * @param mixed $city
	 */
	public function setCity ( $city )
	{
		$this->_city = $city;
	}
}