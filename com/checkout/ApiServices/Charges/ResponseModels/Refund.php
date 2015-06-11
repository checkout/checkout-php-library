<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 11:59 AM
 */

namespace com\checkout\ApiServices\Charges\ResponseModels;


class Refund extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_object;
	private $_amount;
	private $_currency;
	private $_created;
	private $_balanceTransaction;

	/**
	 * @return mixed
	 */
	public function getAmount ()
	{
		return $this->_amount;
	}

	/**
	 * @param mixed $amount
	 */
	public function setAmount ( $amount )
	{
		$this->_amount = $amount;
	}

	/**
	 * @return mixed
	 */
	public function getBalanceTransaction ()
	{
		return $this->_balanceTransaction;
	}

	/**
	 * @param mixed $balanceTransaction
	 */
	public function setBalanceTransaction ( $balanceTransaction )
	{
		$this->_balanceTransaction = $balanceTransaction;
	}

	/**
	 * @return mixed
	 */
	public function getCreated ()
	{
		return $this->_created;
	}

	/**
	 * @param mixed $created
	 */
	public function setCreated ( $created )
	{
		$this->_created = $created;
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
	public function getObject ()
	{
		return $this->_object;
	}

	/**
	 * @param mixed $object
	 */
	public function setObject ( $object )
	{
		$this->_object = $object;
	}

}