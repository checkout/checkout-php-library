<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanUpdate extends BaseRecurringPayment
{

	private $_planId;

	/**
	 * @return mixed
	 */
	public function getPlanId ()
	{
		return $this->_planId;
	}

	/**
	 * @param mixed $customerId
	 */
	public function setPlanId ( $planId )
	{
		$this->_planId = $planId;
	}
}