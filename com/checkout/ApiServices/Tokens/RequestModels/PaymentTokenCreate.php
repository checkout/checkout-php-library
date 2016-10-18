<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/18/2015
 * Time: 9:30 AM
 */

namespace com\checkout\ApiServices\Tokens\RequestModels;


class PaymentTokenCreate extends \com\checkout\ApiServices\Charges\RequestModels\BaseCharge
{
    protected $_transactionIndicator;

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