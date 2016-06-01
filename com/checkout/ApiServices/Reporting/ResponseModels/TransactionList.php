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
		$dataArray = $data->toArray();
		foreach($dataArray as $transaction){
			$this->_data[] = $this->_getTransaction($transaction);
		}
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