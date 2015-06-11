<?php
namespace com\checkout\ApiServices\Cards\RequestModels;
/**
 * Class CardCharge
 * @package PHPPlugin\ApiServives\Charges\RequestModels
 * @note make a magic function that convert in the concept of postedParam
 */
class CardCreate
{
	private $_customerId;
	private $_baseCardCreate;

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
	public function getBaseCardCreate ()
	{
		return $this->_baseCardCreate;
	}

	/**
	 * @param mixed $baseCardCreate
	 */
	public function setBaseCardCreate ( \com\checkout\ApiServices\Cards\RequestModels\BaseCardCreate $baseCardCreate )
	{
		$this->_baseCardCreate = $baseCardCreate;
	}
}