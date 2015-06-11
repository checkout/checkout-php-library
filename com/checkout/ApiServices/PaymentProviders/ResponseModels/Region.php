<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:24 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\ResponseModels;


class Region extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_regionId;
	private $_name;

	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setName($response->getName());
		$this->_setRegionId($response->getRegionId());
	}
	/**
	 * @param mixed $name
	 */
	private function _setName ( $name )
	{
		$this->_name = $name;
	}

	/**
	 * @param mixed $regionId
	 */
	private function _setRegionId ( $regionId )
	{
		$this->_regionId = $regionId;
	}
}