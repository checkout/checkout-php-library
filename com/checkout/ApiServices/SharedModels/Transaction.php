<?php

namespace com\checkout\ApiServices\SharedModels;

class Transaction extends \com\checkout\ApiServices\SharedModels\BaseHttp
{

	protected $_object;
	protected $_id;
	protected $_originId;
	protected $_date;
	protected $_status;
	protected $_type;
	protected $_amount;
	protected $_scheme;
	protected $_responseCode;
	protected $_currency;
	protected $_liveMode;
	protected $_businessName;
	protected $_channelName;
	protected $_trackId;
	protected $_customerId;
	protected $_customerName;
	protected $_customerEmail;

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
	public function getOriginid ()
	{
		return $this->_originId;
	}

	
	/**
	 * @return mixed
	 */
	public function getDate ()
	{
		return $this->_date;
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
	public function getType ()
	{
		return $this->_type;
	}

	
	/**
	 * @return mixed
	 */
	public function getAmount ()
	{
		return $this->_amount;
	}

	
	/**
	 * @return mixed
	 */
	public function getScheme ()
	{
		return $this->_scheme;
	}

	
	/**
	 * @return mixed
	 */
	public function getResponsecode ()
	{
		return $this->_responseCode;
	}

	
	/**
	 * @return mixed
	 */
	public function getCurrency ()
	{
		return $this->_currency;
	}

	
	/**
	 * @return mixed
	 */
	public function getLivemode ()
	{
		return $this->_liveMode;
	}

	
	/**
	 * @return mixed
	 */
	public function getBusinessname ()
	{
		return $this->_businessName;
	}

	
	/**
	 * @return mixed
	 */
	public function getChannelname ()
	{
		return $this->_channelName;
	}

	
	/**
	 * @return mixed
	 */
	public function getTrackid ()
	{
		return $this->_trackId;
	}

	
	/**
	 * @return mixed
	 */
	public function getCustomerid ()
	{
		return $this->_customerId;
	}

	
	/**
	 * @return mixed
	 */
	public function getCustomername ()
	{
		return $this->_customerName;
	}

	
	/**
	 * @return mixed
	 */
	public function getCustomeremail ()
	{
		return $this->_customerEmail;
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
	 * @param mixed $originId
	 */
	public function setOriginid ( $originId )
	{
		$this->_originId = $originId;
	}


	/**
	 * @param mixed $date
	 */
	public function setDate ( $date )
	{
		$this->_date = $date;
	}


	/**
	 * @param mixed $status
	 */
	public function setStatus ( $status )
	{
		$this->_status = $status;
	}


	/**
	 * @param mixed $type
	 */
	public function setType ( $type )
	{
		$this->_type = $type;
	}


	/**
	 * @param mixed $amount
	 */
	public function setAmount ( $amount )
	{
		$this->_amount = $amount;
	}


	/**
	 * @param mixed $scheme
	 */
	public function setScheme ( $scheme )
	{
		$this->_scheme = $scheme;
	}


	/**
	 * @param mixed $responseCode
	 */
	public function setResponsecode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}


	/**
	 * @param mixed $currency
	 */
	public function setCurrency ( $currency )
	{
		$this->_currency = $currency;
	}


	/**
	 * @param mixed $liveMode
	 */
	public function setLivemode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}


	/**
	 * @param mixed $businessName
	 */
	public function setBusinessname ( $businessName )
	{
		$this->_businessName = $businessName;
	}


	/**
	 * @param mixed $channelName
	 */
	public function setChannelname ( $channelName )
	{
		$this->_channelName = $channelName;
	}


	/**
	 * @param mixed $trackId
	 */
	public function setTrackid ( $trackId )
	{
		$this->_trackId = $trackId;
	}


	/**
	 * @param mixed $customerId
	 */
	public function setCustomerid ( $customerId )
	{
		$this->_customerId = $customerId;
	}


	/**
	 * @param mixed $customerName
	 */
	public function setCustomername ( $customerName )
	{
		$this->_customerName = $customerName;
	}


	/**
	 * @param mixed $customerEmail
	 */
	public function setCustomeremail ( $customerEmail )
	{
		$this->_customerEmail = $customerEmail;
	}

}