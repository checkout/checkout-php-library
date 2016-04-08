<?php

namespace com\checkout\ApiServices\SharedModels;

class Charge extends \com\checkout\ApiServices\SharedModels\BaseHttp
{

	protected $_object;
	protected $_id;
	protected $_chargeMode;
	protected $_created;
	protected $_email;
	protected $_liveMode;
	protected $_status;
	protected $_trackId;
	protected $_value;
	protected $_responseCode;


	/**
	 * @return mixed
	 */
	public function getObject ()
	{
		return $this->_object;
	}


	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}


	/**
	 * @return mixed
	 */
	public function getChargeMode ()
	{
		return $this->_chargeMode;
	}


	/**
	 * @return mixed
	 */
	public function getCreated ()
	{
		return $this->_created;
	}


	/**
	 * @return mixed
	 */
	public function getEmail ()
	{
		return $this->_email;
	}


	/**
	 * @return mixed
	 */
	public function getLiveMode ()
	{
		return $this->_liveMode;
	}

	
	/**
	 * @return mixed
	 */
	public function getStatus ()
	{
		return $this->_status;
	}


	/**
	 * @return mixed
	 */
	public function getTrackId ()
	{
		return $this->_trackId;
	}


	/**
	 * @return mixed
	 */
	public function getValue ()
	{
		return $this->_value;
	}


	/**
	 * @return mixed
	 */
	public function getResponseCode ()
	{
		return $this->_responseCode;
	}


	/**
	 * @param mixed $object
	 */
	public function setObject ( $object )
	{
		$this->_object = $object;
	}


	/**
	 * @param mixed $id
	 */
	public function setId ( $id )
	{
		$this->_id = $id;
	}

	
	/**
	 * @param mixed $chargeMode
	 */
	public function setChargeMode ( $chargeMode )
	{
		$this->_chargeMode = $chargeMode;
	}

		/**
	 * @param mixed
	 */
	public function setCreated ( $created )
	{
		$this->_created = $created;
	}


	/**
	 * @param mixed
	 */
	public function setEmail ( $email )
	{
		$this->_email = $email;
	}


	/**
	 * @param mixed
	 */
	public function setLiveMode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}


	/**
	 * @param mixed
	 */
	public function setStatus ( $status )
	{
		$this->_status = $status;
	}


	/**
	 * @param mixed
	 */
	public function setTrackId ( $trackId )
	{
		$this->_trackId = $trackId;
	}


	/**
	 * @param mixed
	 */
	public function setValue ( $value )
	{
		$this->_value = $value;
	}


	/**
	 * @param mixed $responseCode
	 */
	public function setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}