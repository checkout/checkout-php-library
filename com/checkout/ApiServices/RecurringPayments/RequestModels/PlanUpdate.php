<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class PlanUpdate
{

	protected $_planId;
	protected $_name;
	protected $_planTrackId;
	protected $_autoCapTime;
	protected $_value;
	protected $_status;

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
}