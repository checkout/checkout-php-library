<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanWithPaymentTokenCreate extends \com\checkout\ApiServices\Charges\RequestModels\BaseCharge
{
	protected $_transactionIndicator;
    protected $_paymentPlans = array();

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