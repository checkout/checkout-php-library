<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:23 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\RequestModels;


class LocalPaymentProviderModel
{
	private $_providerId;
	private $_paymentToken;
	private $_ip;
	private $_countryCode;
	private $_limit;
	private $_name;
	private $_region;

	/**
	 * @return mixed
	 */
	public function getCountryCode ()
	{
		return $this->_countryCode;
	}

	/**
	 * @param mixed $countryCode
	 */
	public function setCountryCode ( $countryCode )
	{
		$this->_countryCode = $countryCode;
	}

	/**
	 * @return mixed
	 */
	public function getIp ()
	{
		return $this->_ip;
	}

	/**
	 * @param mixed $ip
	 */
	public function setIp ( $ip )
	{
		$this->_ip = $ip;
	}

	/**
	 * @return mixed
	 */
	public function getLimit ()
	{
		return $this->_limit;
	}

	/**
	 * @param mixed $limit
	 */
	public function setLimit ( $limit )
	{
		$this->_limit = $limit;
	}

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
	public function getPaymentToken ()
	{
		return $this->_paymentToken;
	}

	/**
	 * @param mixed $paymentToken
	 */
	public function setPaymentToken ( $paymentToken )
	{
		$this->_paymentToken = $paymentToken;
	}

	/**
	 * @return mixed
	 */
	public function getProviderId ()
	{
		return $this->_providerId;
	}

	/**
	 * @param mixed $providerId
	 */
	public function setProviderId ( $providerId )
	{
		$this->_providerId = $providerId;
	}

	/**
	 * @return mixed
	 */
	public function getRegion ()
	{
		return $this->_region;
	}

	/**
	 * @param mixed $region
	 */
	public function setRegion ( $region )
	{
		$this->_region = $region;
	}

}