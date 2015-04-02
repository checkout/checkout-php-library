<?php
namespace PHPPlugin\ApiServices\Charges\RequestModels;
/**
 * Class CardCharge
 * @package PHPPlugin\ApiServives\Charges\RequestModels
 * @note make a magic function that convert in the concept of postedParam
 */
class CardChargeCreate extends \PHPPlugin\ApiServices\Charges\RequestModels\BaseCharge
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