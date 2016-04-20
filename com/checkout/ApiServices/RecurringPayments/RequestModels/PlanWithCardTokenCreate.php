<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanWithCardTokenCreate extends BaseRecurringPayment
{

	protected $_email;
    protected $_description;
	protected $_value;
	protected $_currency;
	protected $_trackId;
	protected $_cardToken;
	protected $_transactionIndicator;

	
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
	public function getTrackId ()
	{
		return $this->_trackId;
	}

	/**
	 * @param mixed $trackId
	 */
	public function setTrackId ( $trackId )
	{
		$this->_trackId = $trackId;
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
	public function getCardToken ()
	{
		return $this->_cardToken;
	}

	/**
	 * @param mixed $cardToken
	 */
	public function setCardToken ( $cardToken )
	{
		$this->_cardToken = $cardToken;
	}

	/**
	 * @return mixed
	 */
	public function getBaseChargeCreate ()
	{
		return $this->_baseChargeCreate;
	}

	/**
	 * @param mixed $paymentChargeCreate
	 */
	public function setBaseChargeCreate ( \com\checkout\ApiServices\Charges\RequestModels\BaseCharge $baseChargeCreate )
	{
		$this->_baseChargeCreate = $baseChargeCreate;
	}

	/**
     * @return mixed
     */
    public function getTransactionIndicator()
    {
        return $this->_transactionIndicator;
    }

    /**
     * @param mixed $transactionIndicator
     */
    public function setTransactionIndicator($transactionIndicator)
    {
        $this->_transactionIndicator = $transactionIndicator;
    }
}