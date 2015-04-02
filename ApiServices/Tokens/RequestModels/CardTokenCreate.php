<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 2:43 PM
 */

namespace PHPPlugin\ApiServices\Tokens\RequestModels;


class CardTokenCreate extends \PHPPlugin\ApiServices\Charges\RequestModels\BaseCharge
{
	protected $_baseCardCreate;

	/**
	 * @return mixed
	 */
	public function getBaseCardCreate ()
	{
		return $this->_baseCardCreate;
	}

	/**
	 * @param mixed $baseCardCreate
	 */
	public function setBaseCardCreate ( \PHPPlugin\ApiServices\Cards\RequestModels\BaseCardCreate $baseCardCreate )
	{
		$this->_baseCardCreate = $baseCardCreate;
	}
}