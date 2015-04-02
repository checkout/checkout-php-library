<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 12:23 PM
 */

namespace PHPPlugin\ApiServices\Charges\RequestModels;


class ChargeUpdate
{
	private $_chargeId;
	private $_description;
	private $_metadata;

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
}