<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 11:31 AM
 */

namespace com\checkout\ApiServices\Charges\RequestModels;


class CardTokenChargeCreate extends BaseCharge
{
	private $_cardToken;
    protected $_transactionIndicator;

	/**
	 * @return mixed
	 */
	public function getCardToken ()
	{
		return $this->_cardToken;
	}

	/**
	 * @param mixed $cardToken
	 */
	public function setCardToken ( $cardToken )
	{
		$this->_cardToken = $cardToken;
	}

    /**
     * @return mixed
     */
    public function getTransactionIndicator()
    {
        return $this->_transactionIndicator;
    }

    /**
     * @param mixed $transactionIndicator
     */
    public function setTransactionIndicator($transactionIndicator)
    {
        $this->_transactionIndicator = $transactionIndicator;
    }
}