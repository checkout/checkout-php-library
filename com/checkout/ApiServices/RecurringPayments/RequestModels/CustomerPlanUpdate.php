<?php

namespace com\checkout\ApiServices\RecurringPayments\RequestModels;


class CustomerPlanUpdate extends BaseRecurringPayment
{
	private $_customerPlanId;
	private $_cardId;

	/**
	 * @return mixed
	 */
	public function getCustomerPlanId ()
	{
		return $this->_customerPlanId;
	}

	/**
	 * @param mixed $planId
	 */
	public function setCustomerPlanId ( $customerPlanId )
	{
		$this->_customerPlanId = $customerPlanId;
	}

	/**
	 * @return mixed
	 */
	public function getCardId ()
	{
		return $this->_cardId;
	}

	/**
	 * @param mixed $cardId
	 */
	public function setCardId ( $cardId )
	{
		$this->_cardId = $cardId;
	}
}