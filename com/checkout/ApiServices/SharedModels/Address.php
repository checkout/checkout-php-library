<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/16/2015
 * Time: 12:15 PM
 */

namespace com\checkout\ApiServices\SharedModels;


class Address
{
	protected $_addressLine1;
	protected $_addressLine2;
	protected $_postcode;
	protected $_country;
	protected $_city;
	protected $_state;
    protected $_phone;

	/**
	 * @return mixed
	 */
	public function getAddressLine1 ()
	{
		return $this->_addressLine1;
	}

	/**
	 * @param mixed $addressLine1
	 */
	public function setAddressLine1 ( $addressLine1 )
	{
		$this->_addressLine1 = $addressLine1;
	}

	/**
	 * @return mixed
	 */
	public function getAddressLine2 ()
	{
		return $this->_addressLine2;
	}

	/**
	 * @param mixed $addressLine2
	 */
	public function setAddressLine2 ( $addressLine2 )
	{
		$this->_addressLine2 = $addressLine2;
	}

	/**
	 * @return mixed
	 */
	public function getPostcode ()
	{
		return $this->_postcode;
	}

	/**
	 * @param mixed $postcode
	 */
	public function setPostcode ( $postcode )
	{
		$this->_postcode = $postcode;
	}

	/**
	 * @return mixed
	 */
	public function getCountry ()
	{
		return $this->_country;
	}

	/**
	 * @param mixed $country
	 */
	public function setCountry ( $country )
	{
		$this->_country = $country;
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

	/**
	 * @return mixed
	 */
	public function getState ()
	{
		return $this->_state;
	}

	/**
	 * @param mixed $state
	 */
	public function setState ( $state )
	{
		$this->_state = $state;
	}

	/**
	 * @return mixed
	 */
	public function getPhone ()
	{
		return $this->_phone;
	}

	/**
	 * @param mixed $phone
	 */
	public function setPhone ( Phone $phone )
	{
		$this->_phone = $phone;
	}
}