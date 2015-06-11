<?php
namespace com\checkout\ApiServices\Cards\RequestModels;

class CardUpdate
{
	private  $_cardId;
	private  $_customerId;
	private  $_baseCard;

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
	public function getCustomerId ()
	{
		return $this->_customerId;
	}

	/**
	 * @param mixed $customerId
	 */
	public function setCustomerId ( $customerId )
	{
		$this->_customerId = $customerId;
	}

	/**
	 * @return mixed
	 */
	public function getBaseCard ()
	{
		return $this->_baseCard;
	}

	/**
	 * @param mixed $baseCardCreate
	 */
	public function setBaseCard ( \com\checkout\ApiServices\Cards\RequestModels\BaseCard $baseCard )
	{
		$this->_baseCard = $baseCard;
	}
}