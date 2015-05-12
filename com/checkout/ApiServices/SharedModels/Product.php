<?php

namespace com\checkout\ApiServices\SharedModels;

class Product
{
	protected $_name = '';
	protected $_productId = '';
	protected $_description = '';
	protected $_sku = '' ;
	protected $_price = '' ;
	protected $_quantity = '' ;
	protected $_image = '';
	protected $_shippingCost = '' ;
	protected $_trackingUrl = '' ;

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
	public function getProductId ()
	{
		return $this->_productId;
	}

	/**
	 * @param mixed $productId
	 */
	public function setProductId ( $productId )
	{
		$this->_productId = $productId;
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
	public function getSku ()
	{
		return $this->_sku;
	}

	/**
	 * @param mixed $sku
	 */
	public function setSku ( $sku )
	{
		$this->_sku = $sku;
	}

	/**
	 * @return mixed
	 */
	public function getPrice ()
	{
		return $this->_price;
	}

	/**
	 * @param mixed $price
	 */
	public function setPrice ( $price )
	{
		$this->_price = $price;
	}

	/**
	 * @return mixed
	 */
	public function getQuantity ()
	{
		return $this->_quantity;
	}

	/**
	 * @param mixed $quantity
	 */
	public function setQuantity ( $quantity )
	{
		$this->_quantity = $quantity;
	}

	/**
	 * @return mixed
	 */
	public function getImage ()
	{
		return $this->_image;
	}

	/**
	 * @param mixed $image
	 */
	public function setImage ( $image )
	{
		$this->_image = $image;
	}

	/**
	 * @return mixed
	 */
	public function getShippingCost ()
	{
		return $this->_shippingCost;
	}

	/**
	 * @param mixed $shippingCost
	 */
	public function setShippingCost ( $shippingCost )
	{
		$this->_shippingCost = $shippingCost;
	}

	/**
	 * @return mixed
	 */
	public function getTrackingUrl ()
	{
		return $this->_trackingUrl;
	}

	/**
	 * @param mixed $trackingUrl
	 */
	public function setTrackingUrl ( $trackingUrl )
	{
		$this->_trackingUrl = $trackingUrl;
	}
}