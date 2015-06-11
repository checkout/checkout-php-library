<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 1:34 PM
 */

namespace com\checkout\ApiServices\Charges\RequestModels;


class ChargeRetrieveWithPaymentToken
{
	private  $_paymentToken;

	/**
	 * @return mixed
	 */
	public function getPaymentToken ()
	{
		return $this->_paymentToken;
	}

	/**
	 * @param mixed $paymentToken
	 */
	public function setPaymentToken ( $paymentToken )
	{
		$this->_paymentToken = $paymentToken;
	}
}