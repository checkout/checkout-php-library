<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanWithCardTokenCreate extends \com\checkout\ApiServices\Charges\RequestModels\BaseCharge
{
	protected $_cardToken;
	protected $_transactionIndicator;
    protected $_paymentPlans;

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