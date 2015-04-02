<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 7:43 AM
 */

namespace PHPPlugin\ApiServices\Customers\RequestModels;


class CustomerCreate extends \PHPPlugin\ApiServices\Customers\RequestModels\BaseCustomer
{
	protected $_baseCardCreate;

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
	public function setBaseCardCreate ( \PHPPlugin\ApiServices\Cards\RequestModels\BaseCardCreate $baseCardCreate )
	{
		$this->_baseCardCreate = $baseCardCreate;
	}
}