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
	protected $_number;
	protected $_countryCode;

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

	/**
	 * @param mixed $countryCode
	 */
	public function setCountryCode ( $countryCode )
	{
		$this->_countryCode = $countryCode;
	}

	/**
	 * @param mixed $number
	 */
	public function setNumber ( $number )
	{
		$this->_number = $number;
	}

    public function getPhoneDetails()
    {
        return array(
            'number'      => $this->_number,
            'countryCode' => $this->_countryCode
        );
    }
}