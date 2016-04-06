<?php

namespace com\checkout\ApiServices\Charges\ResponseModels;


class ChargeHistory extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_object;
	protected $_id;
	protected $_charges;


	public function __construct($response)
	{
        parent::__construct($response);

        $this->_setObject ( $response->getObject() );
        
        if($response->getCharges()) {
			$this->_setCharges ( $response->getCharges () );
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
	public function getCharges ()
	{
		return $this->_charges;
	}


	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}


	/**
	 * @param mixed $charges
	 */
	protected function _setCharges ( $charges )
	{
        $chargesArray = $charges->toArray();
		$chargesToReturn = array();
		if($chargesArray) {
			foreach($chargesArray as $item){
				$charge  = new \com\checkout\ApiServices\SharedModels\Charge();
				$charge->setId($item['id']);
				$charge->setChargeMode($item['chargeMode']);
				$charge->setCreated($item['created']);
				$charge->setEmail($item['email']);
				$charge->setLiveMode($item['liveMode']);
				$charge->setStatus($item['status']);
				$charge->setTrackId($item['trackId']);
				$charge->setValue($item['value']);
				$charge->setStatus($item['status']);
				$charge->setResponseCode($item['responseCode']);
				$chargesToReturn[] = $charge;
			}
		}

		$this->_charges = $chargesToReturn;
	}


	/**
	 * @param mixed $responseCode
	 */
	private function _setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}