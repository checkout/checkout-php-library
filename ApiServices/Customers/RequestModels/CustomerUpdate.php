<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 7:44 AM
 */

namespace PHPPlugin\ApiServices\Customers\RequestModels;


class CustomerUpdate extends \PHPPlugin\ApiServices\Customers\RequestModels\BaseCustomer
{

	private $_customerId;

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
}