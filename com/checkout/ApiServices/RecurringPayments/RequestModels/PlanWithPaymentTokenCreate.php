<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanWithPaymentTokenCreate extends \com\checkout\ApiServices\Charges\RequestModels\BaseCharge
{
    protected $_paymentPlans = array();

	
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