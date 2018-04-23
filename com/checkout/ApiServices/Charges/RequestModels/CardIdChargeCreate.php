<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 11:09 AM
 */

namespace com\checkout\ApiServices\Charges\RequestModels;


class CardIdChargeCreate extends BaseCharge
{
	protected $_cardId;
    protected $_cvv;
	/**
	 * @return mixed
	 */
	public function getCardId ()
	{
		return $this->_cardId;
	}

	/**
	 * @param mixed $cardId
	 */
	public function setCardId ( $cardId )
	{
		$this->_cardId = $cardId;
	}
    
    /**
	 * @return mixed
	 */
	public function getCvv ()
	{
		return $this->_cvv;
	}

	/**
	 * @param mixed $cvv
	 */
	public function setCvv( $cvv )
	{
		$this->_cvv = $cvv;
	}

}