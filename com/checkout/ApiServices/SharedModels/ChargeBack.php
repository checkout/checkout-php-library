<?php

namespace com\checkout\ApiServices\SharedModels;

class ChargeBack extends \com\checkout\ApiServices\SharedModels\BaseHttp
{

	protected $_object;
	protected $_id;
	protected $_chargeId;
	protected $_scheme;
	protected $_value;
	protected $_currency;
	protected $_trackId;
	protected $_issueDate;
	protected $_cardNumber;
	protected $_indicator;
	protected $_reasonCode;
	protected $_arn;
	protected $_customerName;
	protected $_customerEmail;
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
	public function getChargeId ()
    {
		return $this->_chargeId;
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
	public function getValue ()
	{
		return $this->_value;
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
	public function getTrackId ()
	{
		return $this->_trackId;
	}

	
	/**
	 * @return mixed
	 */
	public function getIssueDate ()
	{
		return $this->_issueDate;
	}

	
	/**
	 * @return mixed
	 */
	public function getCardNumber ()
	{
		return $this->_cardNumber;
	}

	
	/**
	 * @return mixed
	 */
	public function getIndicator ()
	{
		return $this->_indicator;
	}

	
	/**
	 * @return mixed
	 */
	public function getReasonCode ()
	{
		return $this->_reasonCode;
	}

	
	/**
	 * @return mixed
	 */
	public function getArn ()
	{
		return $this->_arn;
	}

	
	/**
	 * @return mixed
	 */
	public function getCustomerName ()
	{
		return $this->_customerName;
	}

	
	/**
	 * @return mixed
	 */
	public function getCustomerEmail ()
	{
		return $this->_customerEmail;
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
	 * @param mixed $chargeId
	 */
	public function setChargeId ( $chargeId )
   	{
		$this->_chargeId = $chargeId;
	}


	/**
	 * @param mixed $scheme
	 */
	public function setScheme ( $scheme )
   	{
		$this->_scheme = $scheme;
	}


	/**
	 * @param mixed $value
	 */
	public function setValue ( $value )
   	{
		$this->_value = $value;
	}


	/**
	 * @param mixed $currency
	 */
	public function setCurrency ( $currency )
   	{
		$this->_currency = $currency;
	}


	/**
	 * @param mixed $trackId
	 */
	public function setTrackId ( $trackId )
   	{
		$this->_trackId = $trackId;
	}


	/**
	 * @param mixed $issueDate
	 */
	public function setIssueDate ( $issueDate )
   	{
		$this->_issueDate = $issueDate;
	}


	/**
	 * @param mixed $cardNumber
	 */
	public function setCardNumber ( $cardNumber )
   	{
		$this->_cardNumber = $cardNumber;
	}


	/**
	 * @param mixed $indicator
	 */
	public function setIndicator ( $indicator )
   	{
		$this->_indicator = $indicator;
	}


	/**
	 * @param mixed $reasonCode
	 */
	public function setReasonCode ( $reasonCode )
   	{
		$this->_reasonCode = $reasonCode;
	}


	/**
	 * @param mixed $arn
	 */
	public function setArn ( $arn )
   	{
		$this->_arn = $arn;
	}


	/**
	 * @param mixed $customerName
	 */
	public function setCustomerName ( $customerName )
   	{
		$this->_customerName = $customerName;
	}


	/**
	 * @param mixed $customerEmail
	 */
	public function setCustomerEmail ( $customerEmail )
   	{
		$this->_customerEmail = $customerEmail;
	}

	/**
	 * @param mixed $responseCode
	 */
	public function setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}