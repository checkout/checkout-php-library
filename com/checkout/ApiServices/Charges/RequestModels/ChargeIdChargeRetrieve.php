<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 1:25 PM
 */

namespace com\checkout\ApiServices\Charges\RequestModels;


class ChargeIdChargeRetrieve
{
	/**
	 * @return mixed
	 */
	public function getChargeId ()
	{
		return $this->_chargeId;
	}

	/**
	 * @param mixed $chargeId
	 */
	public function setChargeId ( $chargeId )
	{
		$this->_chargeId = $chargeId;
	}
	private  $_chargeId;
}