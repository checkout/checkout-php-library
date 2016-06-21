<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 10:15 AM
 */

namespace com\checkout\ApiServices\Cards\ResponseModels;


class Card extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_object;
	protected $_id;
	protected $_last4;
	protected $_paymentMethod;
	protected $_customerId;
	protected $_name;
	protected $_expiryMonth;
	protected $_liveMode;
	protected $_expiryYear;
	protected $_fingerprint;
	protected $_billingDetails;
	protected $_cvvCheck;
	protected $_avsCheck;
	protected $_responseCode;
	protected $_authCode;
	protected $_defaultCard;


	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setAuthCode ( $response->getAuthCode() );
		$this->_setAvsCheck ( $response->getAvsCheck() );

		if ($response->getBillingDetails())
		{
			$this->_setBillingDetails ( $response->getBillingDetails() );
		}

		$this->_setCustomerId ( $response->getCustomerId() );
		$this->_setCvvCheck ( $response->getCvvCheck() );
		$this->_setDefaultCard ( $response->getDefaultCard() );
		$this->_setExpiryMonth ( $response->getExpiryMonth() );
		$this->_setExpiryYear ( $response->getExpiryYear() );
		$this->_setFingerprint ( $response->getFingerprint() );
		$this->_setId ( $response->getId() );
		$this->_setLast4 ( $response->getLast4() );
		$this->_setLiveMode ( $response->getLiveMode() );
		$this->_setName ( $response->getName() );
		$this->_setObject ( $response->getObject() );
		$this->_setPaymentMethod ( $response->getPaymentMethod() );
		$this->_setResponseCode ( $response->getResponseCode() );
	}

	/**
	 * @return mixed
	 */
	public function getAuthCode ()
	{
		return $this->_authCode;
	}

	/**
	 * @return mixed
	 */
	public function getAvsCheck ()
	{
		return $this->_avsCheck;
	}

	/**
	 * @return mixed
	 */
	public function getBillingDetails ()
	{
		return $this->_billingDetails;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerId ()
	{
		return $this->_customerId;
	}

	/**
	 * @return mixed
	 */
	public function getCvvCheck ()
	{
		return $this->_cvvCheck;
	}

	/**
	 * @return mixed
	 */
	public function getDefaultCard ()
	{
		return $this->_defaultCard;
	}

	/**
	 * @return mixed
	 */
	public function getExpiryMonth ()
	{
		return $this->_expiryMonth;
	}

	/**
	 * @return mixed
	 */
	public function getExpiryYear ()
	{
		return $this->_expiryYear;
	}

	/**
	 * @return mixed
	 */
	public function getFingerprint ()
	{
		return $this->_fingerprint;
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
	public function getLast4 ()
	{
		return $this->_last4;
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
	public function getName ()
	{
		return $this->_name;
	}

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
	public function getPaymentMethod ()
	{
		return $this->_paymentMethod;
	}

	/**
	 * @return mixed
	 */
	public function getResponseCode ()
	{
		return $this->_responseCode;
	}


	/**
	 * @param mixed $authCode
	 */
	private function _setAuthCode ( $authCode )
	{
		$this->_authCode = $authCode;
	}

	/**
	 * @param mixed $avsCheck
	 */
	private function _setAvsCheck ( $avsCheck )
	{
		$this->_avsCheck = $avsCheck;
	}

	/**
	 * @param mixed $billingDetails
	 */
	private function _setBillingDetails ( $billingDetails )
	{

		$billingAddress  = new \com\checkout\ApiServices\SharedModels\Address();
		$phone  = new \com\checkout\ApiServices\SharedModels\Phone();

		$billingAddress->setAddressLine1($billingDetails->getAddressLine1());
		$billingAddress->setAddressLine2($billingDetails->getAddressLine2());
		$billingAddress->setPostcode($billingDetails->getPostcode());
		$billingAddress->setCountry($billingDetails->getCountry());
		$billingAddress->setCity($billingDetails->getCity());
		$billingAddress->setState($billingDetails->getState());
		$phone->setNumber($billingDetails->getPhone()->getNumber());
		$billingAddress->setPhone($phone);


		$this->_billingDetails = $billingAddress;
	}

	/**
	 * @param mixed $customerId
	 */
	private function _setCustomerId ( $customerId )
	{
		$this->_customerId = $customerId;
	}

	/**
	 * @param mixed $cvvCheck
	 */
	private function _setCvvCheck ( $cvvCheck )
	{
		$this->_cvvCheck = $cvvCheck;
	}

	/**
	 * @param mixed $defaultCard
	 */
	private function _setDefaultCard ( $defaultCard )
	{
		$this->_defaultCard = $defaultCard;
	}

	/**
	 * @param mixed $expiryMonth
	 */
	private function _setExpiryMonth ( $expiryMonth )
	{
		$this->_expiryMonth = $expiryMonth;
	}

	/**
	 * @param mixed $expiryYear
	 */
	private function _setExpiryYear ( $expiryYear )
	{
		$this->_expiryYear = $expiryYear;
	}

	/**
	 * @param mixed $fingerprint
	 */
	private function _setFingerprint ( $fingerprint )
	{
		$this->_fingerprint = $fingerprint;
	}

	/**
	 * @param mixed $id
	 */
	private function _setId ( $id )
	{
		$this->_id = $id;
	}

	/**
	 * @param mixed $last4
	 */
	private function _setLast4 ( $last4 )
	{
		$this->_last4 = $last4;
	}

	/**
	 * @param mixed $liveMode
	 */
	private function _setLiveMode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}

	/**
	 * @param mixed $name
	 */
	private function _setName ( $name )
	{
		$this->_name = $name;
	}

	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}

	/**
	 * @param mixed $paymentMethod
	 */
	private function _setPaymentMethod ( $paymentMethod )
	{
		$this->_paymentMethod = $paymentMethod;
	}

	/**
	 * @param mixed $responseCode
	 */
	private function _setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}