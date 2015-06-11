<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 4:27 PM
 */

namespace com\checkout\ApiServices\Tokens\ResponseModels;


class PaymentToken
{
	private $_id;
	private $_liveMode;


	public  function  __construct($response)
	{
		$this->_setId($response->getId());
		$this->_setLiveMode($response->getLiveMode());
	}
	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @param mixed $id
	 */
	private function _setId ( $id )
	{
		$this->_id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getLiveMode ()
	{
		return $this->_liveMode;
	}

	/**
	 * @param mixed $liveMode
	 */
	private function _setLiveMode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}


}