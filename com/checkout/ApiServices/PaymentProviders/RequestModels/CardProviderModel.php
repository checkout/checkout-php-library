<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:23 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\RequestModels;


class CardProviderModel
{
	protected $_id;

	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId ( $id )
	{
		$this->_id = $id;
	}

}