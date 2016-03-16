<?php

namespace com\checkout\ApiServices\SharedModels;

class CustomerPaymentPlan extends \com\checkout\ApiServices\SharedModels\BaseHttp
{

	protected $_object;
	protected $_planId;
	protected $_name;
	protected $_planTrackId;
	protected $_autoCapTime;
	protected $_currency;
	protected $_value;
	protected $_cycle;
	protected $_recurringCount;
	protected $_status;
	protected $_customerPlanId;
	protected $_recurringCountLeft;
	protected $_totalCollectedValue;
	protected $_totalCollectedCount;
	protected $_startDate;
	protected $_previousRecurringDate;
	protected $_nextRecurringDate;


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
	public function getPlanId ()
	{
		return $this->_planId;
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
	public function getPlanTrackId ()
	{
		return $this->_planTrackId;
	}


	/**
	 * @return mixed
	 */
	public function getAutoCapTime ()
	{
		return $this->_autoCapTime;
	}


	/**
	 * @return mixed
	 */
	public function getCurrency ()
	{
		return $this->_currency;
	}

	
	/**
	 * @return mixed
	 */
	public function getValue ()
	{
		return $this->_value;
	}


	/**
	 * @return mixed
	 */
	public function getCycle ()
	{
		return $this->_cycle;
	}


	/**
	 * @return mixed
	 */
	public function getRecurringCount ()
	{
		return $this->_recurringCount;
	}


	/**
	 * @return mixed
	 */
	public function getStatus ()
	{
		return $this->_status;
	}


	/**
	 * @return mixed
	 */
	public function getCustomerPlanId ()
	{
		return $this->_customerPlanId;
	}


	/**
	 * @return mixed
	 */
	public function getRecurringCountLeft ()
	{
		return $this->_recurringCountLeft;
	}


	/**
	 * @return mixed
	 */
	public function getTotalCollectedValue ()
	{
		return $this->_totalCollectedValue;
	}


	/**
	 * @return mixed
	 */
	public function getTotalCollectedCount ()
	{
		return $this->_totalCollectedCount;
	}


	/**
	 * @return mixed
	 */
	public function getStartDate ()
	{
		return $this->_startDate;
	}


	/**
	 * @return mixed
	 */
	public function getPreviousRecurringDate ()
	{
		return $this->_previousRecurringDate;
	}


	/**
	 * @return mixed
	 */
	public function getNextRecurringDate ()
	{
		return $this->_nextRecurringDate;
	}


	/**
	 * @param mixed $object
	 */
	public function setObject ( $object )
	{
		$this->_object = $object;
	}

	
	/**
	 * @param mixed $id
	 */
	public function setPlanId ( $planId )
	{
		$this->_planId = $planId;
	}

	
	/**
	 * @param mixed $name
	 */
	public function setName ( $name )
	{
		$this->_name = $name;
	}

		/**
	 * @param mixed
	 */
	public function setPlanTrackId ( $planTrackId )
	{
		$this->_planTrackId = $planTrackId;
	}


	/**
	 * @param mixed
	 */
	public function setAutoCapTime ( $autoCapTime )
	{
		$this->_autoCapTime = $autoCapTime;
	}


	/**
	 * @param mixed
	 */
	public function setCurrency ( $currency )
	{
		$this->_currency = $currency;
	}

	
	/**
	 * @param mixed
	 */
	public function setValue ( $value )
	{
		$this->_value = $value;
	}


	/**
	 * @param mixed
	 */
	public function setCycle ( $cycle )
	{
		$this->_cycle = $cycle;
	}


	/**
	 * @param mixed
	 */
	public function setRecurringCount ( $recurringCount )
	{
		$this->_recurringCount = $recurringCount;
	}


	/**
	 * @param mixed
	 */
	public function setStatus ( $status )
	{
		$this->_status = $status;
	}


	/**
	 * @param mixed
	 */
	public function setCustomerPlanId ( $customerPlanId )
	{
		$this->_customerPlanId = $customerPlanId;
	}


	/**
	 * @param mixed
	 */
	public function setRecurringCountLeft ( $recurringCountLeft )
	{
		$this->_recurringCountLeft = $recurringCountLeft;
	}


	/**
	 * @param mixed
	 */
	public function setTotalCollectedValue ( $totalCollectedValue )
	{
		$this->_totalCollectedValue = $totalCollectedValue;
	}


	/**
	 * @param mixed
	 */
	public function setTotalCollectedCount ( $totalCollectedCount )
	{
		$this->_totalCollectedCount = $totalCollectedCount;
	}


	/**
	 * @param mixed
	 */
	public function setStartDate ( $startDate )
	{
		$this->_startDate = $startDate;
	}


	/**
	 * @param mixed
	 */
	public function setPreviousRecurringDate ( $previousRecurringDate )
	{
		$this->_previousRecurringDate = $previousRecurringDate;
	}


	/**
	 * @param mixed
	 */
	public function setNextRecurringDate ( $nextRecurringDate )
	{
		$this->_nextRecurringDate = $nextRecurringDate;
	}

	/**
	 * @param mixed $responseCode
	 */
	public function setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}