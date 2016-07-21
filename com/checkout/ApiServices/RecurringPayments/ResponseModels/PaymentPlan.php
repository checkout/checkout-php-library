<?php

namespace com\checkout\ApiServices\RecurringPayments\ResponseModels;

class PaymentPlan extends \com\checkout\ApiServices\SharedModels\BaseHttp
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

	public function __construct($response)
	{
        parent::__construct($response);

        $this->setObject ( $response->getObject() );
        $this->setPlanId ( $response->getPlanId() );
        $this->setName ( $response->getName() );
        $this->setPlanTrackId ( $response->getPlanTrackId() );
        $this->setAutoCapTime ( $response->getAutoCapTime() );
        $this->setCurrency ( $response->getCurrency() );
        $this->setValue ( $response->getValue() );
        $this->setCycle ( $response->getCycle() );
        $this->setRecurringCount ( $response->getRecurringCount() );
        $this->setStatus ( $response->getStatus() );

	}


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
	 * @param mixed $responseCode
	 */
	public function setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}