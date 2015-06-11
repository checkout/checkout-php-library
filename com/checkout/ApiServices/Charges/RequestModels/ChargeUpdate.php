<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 12:23 PM
 */

namespace com\checkout\ApiServices\Charges\RequestModels;


class ChargeUpdate
{
	private $_chargeId;
	private $_description;
	private $_metadata = array();

	/**
	 * @return mixed
	 */
	public function getChargeId ()
	{
		return $this->_chargeId;
	}

	/**
	 * @param mixed $chargeId
	 */
	public function setChargeId ( $chargeId )
	{
		$this->_chargeId = $chargeId;
	}

	/**
	 * @return mixed
	 */
	public function getDescription ()
	{
		return $this->_description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription ( $description )
	{
		$this->_description = $description;
	}

	/**
	 * @return array
	 */
	public function getMetadata ()
	{
		return $this->_metadata;
	}

	/**
	 * @param array $metadata
	 */
	public function setMetadata ( $metadata )
	{
		$this->_metadata = $metadata;
	}

}