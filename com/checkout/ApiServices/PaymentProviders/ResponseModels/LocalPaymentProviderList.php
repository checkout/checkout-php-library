<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:24 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\ResponseModels;


class LocalPaymentProviderList extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_object;
	protected $_count;
	protected $_data;

	public function __construct ( $response )
	{

		$this->_setCount ( $response->getCount () );
		$this->_setData ( $response->getData () );
		$this->_setObject ( $response->getObject () );
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
		$dataArray = $data->toArray ();
		foreach ( $dataArray as $provider ) {
			$this->_data[ ] = $this->getProvider ( $provider );
		}
	}

	/**
	 * @param mixed $object
	 */

	private function _setObject ( $object )
	{
		$this->_object = $object;
	}

	private function getProvider ( $customer )
	{
		$dummyObjCart = new \CheckoutApi_Lib_RespondObj();
		$dummyObjCart->setConfig ( $customer );
		$cardObg = new \PHPPlugin\ApiServices\PaymentProviders\ResponseModels\LocalPaymentProvider( $dummyObjCart );

	}
}