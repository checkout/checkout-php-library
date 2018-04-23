<?php
/**
 * User: Santiago del Puerto
 * Date: 13/04/2018
 */
namespace com\checkout\ApiServices\Payouts\RequestModels;

class BasePayout
{
    protected $_value;
    protected $_currency;
    protected $_destination;
    protected $_firstName;
    protected $_lastName;
    
    public function getValue() {
        return $this->_value;
    }

    public function getCurrency() {
        return $this->_currency;
    }

    public function getDestination() {
        return $this->_destination;
    }

    public function getFirstName() {
        return $this->_firstName;
    }

    public function getLastName() {
        return $this->_lastName;
    }

    public function setValue($value) {
        $this->_value = $value;
    }

    public function setCurrency($currency) {
        $this->_currency = $currency;
    }

    public function setDestination($destination) {
        $this->_destination = $destination;
    }

    public function setFirstName($firstName) {
        $this->_firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->_lastName = $lastName;
    }
}