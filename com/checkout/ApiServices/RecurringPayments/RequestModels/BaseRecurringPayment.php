<?php
namespace  com\checkout\ApiServices\RecurringPayments\RequestModels;

class BaseRecurringPayment
{
	protected $_name;
	protected $_planTrackId;
	protected $_autoCapTime;
	protected $_currency;
	protected $_value;
	protected $_cycle;
	protected $_recurringCount;
    protected $_startDate;
	protected $_status;
    protected $_planId;

	/**
	 * @return mixed
	 */
	public function getName ()
	{
		return $this->_name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName ( $name )
	{
		$this->_name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getPlanTrackId ()
	{
		return $this->_planTrackId;
	}

	/**
	 * @param mixed $planTrackId
	 */
	public function setPlanTrackId ( $planTrackId )
	{
		$this->_planTrackId = $planTrackId;
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
	public function getCycle ()
	{
		return $this->_cycle;
	}

	/**
	 * @param mixed $cycle
	 */
	public function setCycle ( $cycle )
	{
		$this->_cycle = $cycle;
	}

	/**
	 * @return mixed
	 */
	public function getRecurringCount ()
	{
		return $this->_recurringCount;
	}

	/**
	 * @param mixed $recurringCount
	 */
	public function setRecurringCount ( $recurringCount )
	{
		$this->_recurringCount = $recurringCount;
	}

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->_startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate( $startDate )
    {
        $this->_startDate = $startDate;
    }

	/**
	 * @return mixed
	 */
	public function getStatus ()
	{
		return $this->_status;
	}

	/**
	 * @param mixed $status
	 */
	public function setStatus ( $status )
	{
		$this->_status = $status;
	}

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