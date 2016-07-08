<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class CustomerPlanFromExistingCreateWithCardToken extends PlanWithCardTokenCreate
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
	 * @param mixed $planId
	 */
	public function setPlanId ( $planId )
	{
		$this->_planId = $planId;
	}

}