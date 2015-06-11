<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:23 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\ResponseModels;


class CustomFields extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_key;
	protected $_dataType;
	protected $_label;
	protected $_required;
	protected $_order;
	protected $_minLength;
	protected $_maxLength;
	protected $_isActive;
	protected $_errorCodes;
	protected $_lookupValues;

	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setDataType($response->getDataType());
		$this->_setErrorCodes($response->getErrorCodes());
		$this->_sethisActive($response->gethisActive());
		$this->_setKey($response->getKey());
		$this->_setLabel($response->getLabel());
		$this->_setLookupValues($response->getLookupValues());
		$this->_setMaxLength($response->getMaxLength());
		$this->_setMinLength($response->getMinLength());
		$this->_setOrder($response->getOrder());
		$this->_setRequired($response->getRequired());

	}

	/**
	 * @param mixed $dataType
	 */
	protected function _setDataType ( $dataType )
	{
		$this->_dataType = $dataType;
	}

	/**
	 * @param mixed $errorCodes
	 */
	protected function _setErrorCodes ( $errorCodes )
	{
		$this->_errorCodes = $errorCodes->toArray();
	}

	/**
	 * @param mixed $isActive
	 */
	protected function _setIsActive ( $isActive )
	{
		$this->_isActive = $isActive;
	}

	/**
	 * @param mixed $key
	 */
	protected function _setKey ( $key )
	{
		$this->_key = $key;
	}

	/**
	 * @param mixed $label
	 */
	protected function _setLabel ( $label )
	{
		$this->_label = $label;
	}

	/**
	 * @param mixed $lookupValues
	 */
	protected function _setLookupValues ( $lookupValues )
	{
		$this->_lookupValues = $lookupValues->toArray();
	}

	/**
	 * @param mixed $maxLength
	 */
	protected function _setMaxLength ( $maxLength )
	{
		$this->_maxLength = $maxLength;
	}

	/**
	 * @param mixed $minLength
	 */
	protected function _setMinLength ( $minLength )
	{
		$this->_minLength = $minLength;
	}

	/**
	 * @param mixed $order
	 */
	protected function _setOrder ( $order )
	{
		$this->_order = $order;
	}

	/**
	 * @param mixed $required
	 */
	protected function _setRequired ( $required )
	{
		$this->_required = $required;
	}

	/**
	 * @return mixed
	 */
	public function getDataType ()
	{
		return $this->_dataType;
	}

	/**
	 * @param mixed $dataType
	 */
	public function setDataType ( $dataType )
	{
		$this->_dataType = $dataType;
	}

	/**
	 * @return mixed
	 */
	public function getErrorCodes ()
	{
		return $this->_errorCodes;
	}

	/**
	 * @param mixed $errorCodes
	 */
	public function setErrorCodes ( $errorCodes )
	{
		$this->_errorCodes = $errorCodes;
	}

	/**
	 * @return mixed
	 */
	public function getIsActive ()
	{
		return $this->_isActive;
	}

	/**
	 * @param mixed $isActive
	 */
	public function setIsActive ( $isActive )
	{
		$this->_isActive = $isActive;
	}

	/**
	 * @return mixed
	 */
	public function getKey ()
	{
		return $this->_key;
	}

	/**
	 * @param mixed $key
	 */
	public function setKey ( $key )
	{
		$this->_key = $key;
	}

	/**
	 * @return mixed
	 */
	public function getLabel ()
	{
		return $this->_label;
	}

	/**
	 * @param mixed $label
	 */
	public function setLabel ( $label )
	{
		$this->_label = $label;
	}

	/**
	 * @return mixed
	 */
	public function getLookupValues ()
	{
		return $this->_lookupValues;
	}

	/**
	 * @param mixed $lookupValues
	 */
	public function setLookupValues ( $lookupValues )
	{
		$this->_lookupValues = $lookupValues;
	}

	/**
	 * @return mixed
	 */
	public function getMaxLength ()
	{
		return $this->_maxLength;
	}

	/**
	 * @param mixed $maxLength
	 */
	public function setMaxLength ( $maxLength )
	{
		$this->_maxLength = $maxLength;
	}

	/**
	 * @return mixed
	 */
	public function getMinLength ()
	{
		return $this->_minLength;
	}

	/**
	 * @param mixed $minLength
	 */
	public function setMinLength ( $minLength )
	{
		$this->_minLength = $minLength;
	}

	/**
	 * @return mixed
	 */
	public function getOrder ()
	{
		return $this->_order;
	}

	/**
	 * @param mixed $order
	 */
	public function setOrder ( $order )
	{
		$this->_order = $order;
	}

	/**
	 * @return mixed
	 */
	public function getRequired ()
	{
		return $this->_required;
	}

	/**
	 * @param mixed $required
	 */
	public function setRequired ( $required )
	{
		$this->_required = $required;
	}

}