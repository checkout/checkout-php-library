<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 10:15 AM
 */

namespace com\checkout\ApiServices\RecurringPayments\ResponseModels;


class Card extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_object;
	protected $_id;
	protected $_name;
	protected $_planTrackId;
	protected $_autoCapTime;
	protected $_currency;
	protected $_value;
	protected $_cycle;
	protected $_recurringCount;
	protected $_status;
	protected $_totalCollectionCount;
	protected $_totalCollectionValue;
	


	public function __construct($response)
	{
        parent::__construct($response);

        $this->_setObject ( $response->getObject() );
        $this->_setId ( $response->getId() );
        $this->_setName ( $response->getName() );
        $this->_setPlanTrackId ( $response->getPlanTrackId() );
        $this->_setAutoCapTime ( $response->getAutoCapTime() );
        $this->_setCurrency ( $response->getCurrency() );
        $this->_setValue ( $response->getValue() );
        $this->_setCycle ( $response->getCycle() );
        $this->_setRecurringCount ( $response->getRecurringCount() );
        $this->_setStatus ( $response->getStatus() );
        $this->_setTotalCollectionCount ( $response->getTotalCollectionCount() );
        $this->_setTotalCollectionValue ( $response->getTotalCollectionValue() );
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
	public function getId ()
	{
		return $this->_id;
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
	public function getTotalCollectionCount ()
	{
		return $this->_totalCollectionCount;
	}


	/**
	 * @return mixed
	 */
	public function getTotalCollectionValue ()
	{
		return $this->_totalCollectionValue;
	}


	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}


	/**
	 * @param mixed $id
	 */
	private function _setId ( $id )
	{
		$this->_id = $id;
	}

	
	/**
	 * @param mixed $name
	 */
	private function _setName ( $name )
	{
		$this->_name = $name;
	}

		/**
	 * @param mixed
	 */
	public function _setPlanTrackId ( $planTrackId )
	{
		$this->_planTrackId = $planTrackId;
	}


	/**
	 * @param mixed
	 */
	public function _setAutoCapTime ( $autoCapTime )
	{
		$this->_autoCapTime = $autoCapTime;
	}


	/**
	 * @param mixed
	 */
	public function _setCurrency ( $currency )
	{
		$this->_currency = $currency;
	}

	
	/**
	 * @param mixed
	 */
	public function _setValue ( $value )
	{
		$this->_value = $value;
	}


	/**
	 * @param mixed
	 */
	public function _setCycle ( $cycle )
	{
		$this->_cycle = $cycle;
	}


	/**
	 * @param mixed
	 */
	public function _setRecurringCount ( $recurringCount )
	{
		$this->_recurringCount = $recurringCount;
	}


	/**
	 * @param mixed
	 */
	public function _setStatus ( $status )
	{
		$this->_status = $status;
	}


	/**
	 * @param mixed
	 */
	public function _setTotalCollectionCount ( $totalCollectionCount )
	{
		$this->_totalCollectionCount = $totalCollectionCount;
	}


	/**
	 * @param mixed
	 */
	public function _setTotalCollectionValue ( $totalCollectionValue )
	{
		$this->_totalCollectionValue = $totalCollectionValue;
	}


	/**
	 * @param mixed $responseCode
	 */
	private function _setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}