<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class CustomerPlanFromExistingCreate extends PlanWithChargeCreate
{

	private $_planId;
	private $_startDate;

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

	/**
	 * @return mixed
	 */
	public function getStartDate ()
	{
		return $this->_startDate;
	}

	/**
	 * @param mixed $startDate
	 */
	public function setStartDate ( $startDate )
	{
		$this->_startDate = $startDate;
	}

}