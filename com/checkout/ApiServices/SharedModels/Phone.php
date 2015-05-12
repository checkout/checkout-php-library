<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 5/12/2015
 * Time: 8:20 AM
 */

namespace com\checkout\ApiServices\SharedModels;


class Phone
{
	private $_number;
	private $_countryCode;

	/**
	 * @return mixed
	 */
	public function getCountryCode ()
	{
		return $this->_countryCode;
	}

	/**
	 * @return mixed
	 */
	public function getNumber ()
	{
		return $this->_number;
	}
}