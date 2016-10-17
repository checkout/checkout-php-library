<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanWithCardIdCreate extends \com\checkout\ApiServices\Charges\RequestModels\BaseCharge
{
	protected $_cardId;
    protected $_cvv;
	protected $_transactionIndicator;
    protected $_paymentPlans;

	/**
	 * @return mixed
	 */
	public function getCardId ()
	{
		return $this->_cardId;
	}

	/**
	 * @param mixed $cardId
	 */
	public function setCardId ( $cardId )
	{
		$this->_cardId = $cardId;
	}
    
    /**
	 * @return mixed
	 */
	public function getCvv ()
	{
		return $this->_cvv;
	}

	/**
	 * @param mixed $cvv
	 */
	public function setCvv( $cvv )
	{
		$this->_cvv = $cvv;
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

	/**
	 * @return mixed
	 */
	public function getPaymentPlans ()
	{
		return $this->_paymentPlans;
	}

	/**
	 * @param mixed $paymentPlans
	 */
	public function setPaymentPlans ( BaseRecurringPayment $paymentPlans )
	{
		$this->_paymentPlans[] = $paymentPlans;
	}
}