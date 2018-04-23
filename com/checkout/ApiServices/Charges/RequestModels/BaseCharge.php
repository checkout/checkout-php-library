<?php
namespace com\checkout\ApiServices\Charges\RequestModels;

class BaseCharge extends BaseChargeInfo
{
	protected $_email;
    protected $_customerName;
	protected $_customerId;
	protected $_description;
	protected $_autoCapture;
	protected $_autoCapTime;
	protected $_shippingDetails;
	protected $_products = array();
	protected $_value;
	protected $_currency;
	protected $_customerIp;
    protected $_chargeMode;
	protected $_riskCheck;
	protected $_attemptN3D;
	protected $_transactionIndicator;
	protected $_cardOnFile;
	protected $_previousChargeId;
	protected $_billingDetails;
	protected $_successUrl;
	protected $_failUrl;

	/**
	 * @return mixed
	 */
	public function getCustomerIp ()
	{
		return $this->_customerIp;
	}

	/**
	 * @param mixed $customerIp
	 */
	public function setCustomerIp ( $customerIp )
	{
		$this->_customerIp = $customerIp;
	}
    
    /**
	 * @return mixed
	 */
	public function getCustomerName()
	{
		return $this->_customerName;
	}

	/**
	 * @param mixed $customerName
	 */
	public function setCustomerName ( $customerName )
	{
		$this->_customerName = $customerName;
	}

	/**
	 * @return mixed
	 */
	public function getCurrency ()
	{
		return $this->_currency;
	}

	/**
	 * @param mixed $currency
	 */
	public function setCurrency ( $currency )
	{
		$this->_currency = $currency;
	}

	/**
	 * @return mixed
	 */
	public function getValue ()
	{
		return $this->_value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue ( $value )
	{
		$this->_value = $value;
	}

	/**
	 * @return mixed
	 */
	public function getEmail ()
	{
		return $this->_email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail ( $email )
	{
		$this->_email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerId ()
	{
		return $this->_customerId;
	}

	/**
	 * @param mixed $customerId
	 */
	public function setCustomerId ( $customerId )
	{
		$this->_customerId = $customerId;
	}

	/**
	 * @return mixed
	 */
	public function getDescription ()
	{
		return $this->_description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription ( $description )
	{
		$this->_description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getAutoCapture ()
	{
		return $this->_autoCapture;
	}

	/**
	 * @param mixed $autoCapture
	 */
	public function setAutoCapture ( $autoCapture )
	{
		$this->_autoCapture = $autoCapture;
	}

	/**
	 * @return mixed
	 */
	public function getAutoCapTime ()
	{
		return $this->_autoCapTime;
	}

	/**
	 * @param mixed $autoCapTime
	 */
	public function setAutoCapTime ( $autoCapTime )
	{
		$this->_autoCapTime = $autoCapTime;
	}

	/**
	 * @return mixed
	 */
	public function getShippingDetails ()
	{
		return $this->_shippingDetails;
	}

	/**
	 * @param mixed $shippingDetails
	 */
	public function setShippingDetails ( \com\checkout\ApiServices\SharedModels\Address $shippingDetails )
	{
		$this->_shippingDetails = $shippingDetails;
	}

	/**
	 * @return mixed
	 */
	public function getProducts ()
	{
		return $this->_products;
	}

	/**
	 * @param mixed $products
	 */
	public function setProducts ( \com\checkout\ApiServices\SharedModels\Product $products )
	{

		$this->_products[] = $products;
	}

    public function getChargeMode ()
    {
        return $this->_chargeMode;
    }

    /**
     * @param mixed $chargeMode
     */
    public function setChargeMode ( $chargeMode )
    {
        $this->_chargeMode = $chargeMode;
    }

	public function getRiskCheck()
	{
		return $this->_riskCheck;
	}

	/**
	 * @param mixed $riskCheck
	 */
	public function setRiskCheck( $riskCheck)
	{
		$this->_riskCheck= $riskCheck;
	}

	/**
	 * @param mixed $attemptN3D
	 */
	public function setAttemptN3D( $attemptN3D)
	{
		$this->_attemptN3D= $attemptN3D;
	}

	public function getAttemptN3D()
	{
		return $this->_attemptN3D;
	}
        
	public function getTransactionIndicator()
	{
		return $this->_transactionIndicator;
	}

	public function setTransactionIndicator($transactionIndicator)
	{
		$this->_transactionIndicator = $transactionIndicator;
	}

	public function getCardOnFile() {
		return $this->_cardOnFile;
	}

	public function getPreviousChargeId() {
		return $this->_previousChargeId;
	}

	public function setCardOnFile($cardOnFile) {
		$this->_cardOnFile = $cardOnFile;
	}

	public function setPreviousChargeId($previousChargeId) {
		$this->_previousChargeId = $previousChargeId;
	}
	
	/**
	 * @param mixed billingDetails
	 */
	public function setBillingDetails( $billingDetails)
	{
		$this->_billingDetails= $billingDetails;
	}
 
	public function getBillingDetails()
	{
		return $this->_billingDetails;
	}

	/**
	 * @param mixed $successUrl
	 */
	public function setSuccessUrl( $successUrl)
	{
		$this->_successUrl= $successUrl;
	}

	public function getSuccessUrl()
	{
		return $this->_successUrl;
	}

	/**
	 * @param mixed $failUrl
	 */
	public function setFailUrl( $failUrl)
	{
		$this->_failUrl= $failUrl;
	}

	public function getFailUrl()
	{
		return $this->_failUrl;

	}

}
