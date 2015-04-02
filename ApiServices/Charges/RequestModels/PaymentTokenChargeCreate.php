<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 1:04 PM
 */

namespace PHPPlugin\ApiServices\Charges\RequestModels;


class PaymentTokenChargeCreate extends \PHPPlugin\ApiServices\Charges\RequestModels\CardChargeCreate
{
	private $_paymentToken;

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