<?php
namespace  com\checkout\ApiServices\RecurringPayments\RequestModels;

class BaseRecurringPayment extends \com\checkout\ApiServices\Charges\RequestModels\BaseChargeInfo
{
	protected $_name;
	protected $_planTrackId;
	protected $_autoCapTime;
	protected $_currency;
	protected $_value;
	protected $_cycle;
	protected $_recurringCount;
	protected $_status;
	protected $_shippingDetails;
	protected $_products = array();
    

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
	public function getShippingDetails ()
	{
		return $this->_shippingDetails;
	}

	/**
	 * @param mixed $shippingDetails
	 */
	public function setShippingDetails ( \com\checkout\ApiServices\SharedModels\Address $shippingDetails )
	{
		$this->_shippingDetails = $shippingDetails;
	}

	/**
	 * @return mixed
	 */
	public function getProducts ()
	{
		return $this->_products;
	}

	/**
	 * @param mixed $products
	 */
	public function setProducts ( \com\checkout\ApiServices\SharedModels\Product $products )
	{

		$this->_products[] = $products;
	}
}