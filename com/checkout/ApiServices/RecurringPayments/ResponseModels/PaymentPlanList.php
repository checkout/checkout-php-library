<?php

namespace com\checkout\ApiServices\RecurringPayments\ResponseModels;

class PaymentPlanList extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_totalRows;
	private $_offSet;
	private $_count;
	private $_data;

	/**
	 * @param null $response
	 */
    public function __construct($response)
    {
        parent::__construct($response);
        $this->_setTotalRows($response->getTotalRows());
		$this->_setOffset($response->getOffset());
	    $this->_setCount($response->getCount());
	    $this->_setData($response->getData());
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
		$dataArray = $data->toArray();
		foreach($dataArray as $paymentPlan){
			$this->_data[] = $this->_getPaymentPlan($paymentPlan);
		}
	}

	/**
	 * @param $paymentPlan
	 * @return mixed
	 */
	private function _getPaymentPlan ( $paymentPlan )
	{
		return $paymentPlan;
	}

	/**
	 * @param $pageNumber
	 */
	private function _setTotalRows($totalRows) {
		$this->_totalRows = $totalRows;
	}

	/**
	 * @return mixed
	 */
	public function getTotalRows() {
		return $this->_totalRows;
	}

	/**
	 * @param $pageSize
	 */
	private function _setOffset($offset) {
		$this->_offset = $offset;
	}

	/**
	 * @return mixed
	 */
	public function getOffset() {
		return $this->_offset;
	}
}