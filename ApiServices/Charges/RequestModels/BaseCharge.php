<?php
namespace PHPPlugin\ApiServices\Charges\RequestModels;

class BaseCharge
{
	protected $_email;
	protected $_customerId;
	protected $_description;
	protected $_autoCapture;
	protected $_autoCapTime;
	protected $_shippingDetails;
	protected $_products = array();
	protected $_metadata = array();
	protected $_value;
	protected $_currency;

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
	public function getEmail ()
	{
		return $this->_email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail ( $email )
	{
		$this->_email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerId ()
	{
		return $this->_customerId;
	}

	/**
	 * @param mixed $customerId
	 */
	public function setCustomerId ( $customerId )
	{
		$this->_customerId = $customerId;
	}

	/**
	 * @return mixed
	 */
	public function getDescription ()
	{
		return $this->_description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription ( $description )
	{
		$this->_description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getAutoCapture ()
	{
		return $this->_autoCapture;
	}

	/**
	 * @param mixed $autoCapture
	 */
	public function setAutoCapture ( $autoCapture )
	{
		$this->_autoCapture = $autoCapture;
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
	public function getShippingDetails ()
	{
		return $this->_shippingDetails;
	}

	/**
	 * @param mixed $shippingDetails
	 */
	public function setShippingDetails ( \PHPPlugin\ApiServices\SharedModels\ShippingAddress $shippingDetails )
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
	public function setProducts ( \PHPPlugin\ApiServices\SharedModels\Product $products )
	{
		$this->_products[] = $products;
	}

	/**
	 * @return mixed
	 */
	public function getMetadata ()
	{
		return $this->_metadata;
	}

	/**
	 * @param mixed $metadata
	 */
	public function setMetadata ( $metadata )
	{

		if(!empty($metadata) && is_array($metadata)) {
			$this->_metadata = array_merge_recursive ( $this->_metadata , $metadata );
		}
	}

}