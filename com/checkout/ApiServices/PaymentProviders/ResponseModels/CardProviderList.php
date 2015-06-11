<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:23 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\ResponseModels;


class CardProviderList extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_object;
	private $_count;
	private $_data;

	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setCount($response->getCount());
		$this->_setData($response->getData());
		$this->_setObject($response->getObject());
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
		foreach($dataArray as $cardP){
			$this->_data[] = $this->setCardProvider($cardP);
		}
	}

	private function setCardProvider($cardP)
	{
		$dummyObjCart = new \CheckoutApi_Lib_RespondObj();
		$dummyObjCart->setConfig($cardP);
		$cardObg = new \PHPPlugin\ApiServices\PaymentProviders\ResponseModels\CardProvider($dummyObjCart);
		return $cardObg;
	}
	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}

	/**
	 * @return mixed
	 */
	public function getCount ()
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
	 * @return mixed
	 */
	public function getObject ()
	{
		return $this->_object;
	}

}