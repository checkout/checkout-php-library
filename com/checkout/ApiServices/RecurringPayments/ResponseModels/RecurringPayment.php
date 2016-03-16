<?php

namespace com\checkout\ApiServices\RecurringPayments\ResponseModels;


class RecurringPayment extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_object;
	protected $_id;
	protected $_paymentPlans;
	protected $_totalCollectionCount;
	protected $_totalCollectionValue;
	


	public function __construct($response)
	{
        parent::__construct($response);

        $this->_setObject ( $response->getObject() );
        $this->_setTotalCollectionCount ( $response->getTotalCollectionCount() );
        $this->_setTotalCollectionValue ( $response->getTotalCollectionValue() );

        if($response->getPaymentPlans()) {
			$this->_setPaymentPlans ( $response->getPaymentPlans () );
		}
	}


	/**
	 * @return mixed
	 */
	public function getObject ()
	{
		return $this->_object;
	}


	/**
	 * @return mixed
	 */
	public function getTotalCollectionCount ()
	{
		return $this->_totalCollectionCount;
	}


	/**
	 * @return mixed
	 */
	public function getTotalCollectionValue ()
	{
		return $this->_totalCollectionValue;
	}


	/**
	 * @return mixed
	 */
	public function getPaymentPlans ()
	{
		return $this->_paymentPlans;
	}


	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}


	/**
	 * @param mixed $paymentPlans
	 */
	protected function _setPaymentPlans ( $paymentPlans )
	{
        $paymentPlansArray = $paymentPlans->toArray();
		$paymentPlansToReturn = array();
		if($paymentPlansArray) {
			foreach($paymentPlansArray as $item){
				$paymentPlan  = new \com\checkout\ApiServices\SharedModels\PaymentPlan();
				$paymentPlan->setPlanId($item['planId']);
				$paymentPlan->setName($item['name']);
				$paymentPlan->setPlanTrackId($item['planTrackId']);
				$paymentPlan->setAutoCapTime($item['autoCapTime']);
				$paymentPlan->setCurrency($item['currency']);
				$paymentPlan->setValue($item['value']);
				$paymentPlan->setRecurringCount($item['recurringCount']);
				$paymentPlan->setStatus($item['status']);
				$paymentPlansToReturn[] = $paymentPlan;
			}
		}

		$this->_paymentPlans = $paymentPlansToReturn;
	}


	/**
	 * @param mixed
	 */
	public function _setTotalCollectionCount ( $totalCollectionCount )
	{
		$this->_totalCollectionCount = $totalCollectionCount;
	}


	/**
	 * @param mixed
	 */
	public function _setTotalCollectionValue ( $totalCollectionValue )
	{
		$this->_totalCollectionValue = $totalCollectionValue;
	}


	/**
	 * @param mixed $responseCode
	 */
	private function _setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}