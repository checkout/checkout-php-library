<?php

namespace com\checkout\ApiServices\Reporting\ResponseModels;


class ChargebackList  extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_count;
	private $_pageNumber;
	private $_pageSize;
	private $_data;

	/**
	 * @param null $response
	 */
    public function __construct($response)
    {
        parent::__construct($response);
	    $this->_setCount($response->getTotalRecords());
	    $this->_setData($response->getData());
		$this->_setPageNumber($response->getPageNumber());
		$this->_setPageSize($response->getPageSize());
    }

	/**
	 * @return mixed
	 */
	public function getCount()
	{
		return $this->_count;
	}

	/**
	 * @return mixed
	 */
	public function getData ()
	{
		return $this->_data;
	}

	/**
	 * @param mixed $count
	 */
	private function _setCount ( $count )
	{
		$this->_count = $count;
	}

	/**
	 * @param mixed $data
	 */
	private function _setData ( $data )
	{
		$chargeBacksArray = $data->toArray();
		$chargeBacksToReturn = array();
		if($chargeBacksArray) {
			foreach($chargeBacksArray as $item){
				$chargeBack  = new \com\checkout\ApiServices\SharedModels\ChargeBack();
				$chargeBack->setId($item['id']);
				$chargeBack->setChargeId($item['chargeId']);
				$chargeBack->setScheme($item['scheme']);
				$chargeBack->setValue($item['value']);
				$chargeBack->setCurrency($item['currency']);
				$chargeBack->setTrackId($item['trackId']);
				$chargeBack->setIssueDate($item['issueDate']);
				$chargeBack->setCardNumber($item['cardNumber']);
				$chargeBack->setIndicator($item['indicator']);
				$chargeBack->setReasonCode($item['reasonCode']);
				$chargeBack->setArn($item['arn']);
				$chargeBack->setCustomerName($item['customer']['name']);
				$chargeBack->setCustomerEmail($item['customer']['email']);
				$chargeBack->setResponseCode($item['responseCode']);
				$chargeBacksToReturn[] = $chargeBack;
			}
		}

		$this->_data = $chargeBacksToReturn;
	}

	/**
	 * @param $chargeback
	 * @return mixed
	 */
	private function _getChargeback ( $chargeback )
	{
		return $chargeback;
	}

	/**
	 * @param $pageNumber
	 */
	private function _setPageNumber($pageNumber) {
		$this->_pageNumber = $pageNumber;
	}

	/**
	 * @return mixed
	 */
	public function getPageNumber() {
		return $this->_pageNumber;
	}

	/**
	 * @param $pageSize
	 */
	private function _setPageSize($pageSize) {
		$this->_pageSize = $pageSize;
	}

	/**
	 * @return mixed
	 */
	public function getPageSize() {
		return $this->_pageSize;
	}
}