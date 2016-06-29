<?php
/**
 * Created by PhpStorm.
 * Date: 22.12.2015
 * Time: 12:57
 */
namespace com\checkout\ApiServices\Reporting\ResponseModels;


class TransactionList  extends \com\checkout\ApiServices\SharedModels\BaseHttp
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
		$transactionsArray = $data->toArray();
		$transactionsToReturn = array();
		if($transactionsArray) {
			foreach($transactionsArray as $item){
				$transaction  = new \com\checkout\ApiServices\SharedModels\Transaction();
				$transaction->setId($item['id']);
				$transaction->setOriginId($item['originId']);
				$transaction->setDate($item['date']);
				$transaction->setStatus($item['status']);
				$transaction->setType($item['type']);
				$transaction->setAmount($item['amount']);
				$transaction->setScheme($item['scheme']);
				$transaction->setResponsecode($item['responseCode']);
				$transaction->setCurrency($item['currency']);
				$transaction->setLiveMode($item['liveMode']);
				$transaction->setBusinessName($item['businessName']);
				$transaction->setChannelName($item['channelName']);
				$transaction->setTrackId($item['trackId']);
				$transaction->setCustomerId($item['customer']['id']);
				$transaction->setCustomerName($item['customer']['name']);
				$transaction->setCustomerEmail($item['customer']['email']);
				$transactionsToReturn[] = $transaction;
			}
		}

		$this->_data = $transactionsToReturn;
	}

	/**
	 * @param $transaction
	 * @return mixed
	 */
	private function _getTransaction ( $transaction )
	{
		return $transaction;
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