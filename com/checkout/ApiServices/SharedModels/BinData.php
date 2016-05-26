<?php

namespace com\checkout\ApiServices\SharedModels;

class BinData extends \com\checkout\ApiServices\SharedModels\BaseHttp
{

	protected $_object;
	protected $_bin;
	protected $_issuerCountryISO2;
	protected $_cardType;


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
	public function getBin ()
	{
		return $this->_bin;
	}


	/**
	 * @return mixed
	 */
	public function getIssuerCountryISO2 ()
	{
		return $this->_issuerCountryISO2;
	}


	/**
	 * @return mixed
	 */
	public function getCardType ()
	{
		return $this->_cardType;
	}


	/**
	 * @param mixed $object
	 */
	public function setObject ( $object )
	{
		$this->_object = $object;
	}


	/**
	 * @param mixed $bin
	 */
	public function setBin ( $bin )
	{
		$this->_bin = $bin;
	}

	
	/**
	 * @param mixed $issuerCountryISO2
	 */
	public function setIssuerCountryISO2 ( $issuerCountryISO2 )
	{
		$this->_issuerCountryISO2 = $issuerCountryISO2;
	}

		/**
	 * @param mixed $cardType
	 */
	public function setCardType ( $cardType )
	{
		$this->_cardType = $cardType;
	}

}