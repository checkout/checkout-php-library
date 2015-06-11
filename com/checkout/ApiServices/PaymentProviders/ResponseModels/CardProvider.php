<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:23 AM
 */

namespace com\checkout\ApiServices\PaymentProviders\ResponseModels;


class CardProvider extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_id;
	private $_name;
	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setId($response->getId());
		$this->_setName($response->getName());
	}

	/**
	 * @param mixed $id
	 */
	protected function _setId ( $id )
	{
		$this->_id = $id;
	}

	/**
	 * @param mixed $name
	 */
	protected function _setName ( $name )
	{
		$this->_name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @return mixed
	 */
	public function getName ()
	{
		return $this->_name;
	}

}