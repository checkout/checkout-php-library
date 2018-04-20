<?php
/**
 * User: Santiago del Puerto
 * Date: 13/04/2018
 */

namespace com\checkout\ApiServices\Payouts\ResponseModels;


class Payout extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
    protected $_id;
    protected $_destination;
    protected $_customerId;
    protected $_currency;
    protected $_value;
    protected $_responseCode;
    protected $_responseSummary;
    protected $_responseDetails;
    protected $_authCode;
    protected $_status;
    protected $_eventId;
    protected $_errorCode;
    protected $_message;
    protected $_errorMessageCodes;
    protected $_errors;
 
    public function __construct($response)
	{
        parent::__construct($response);
        $this->_setId($response->getId());
        $this->_setDestination($response->getDestination());
        $this->_setCustomerId($response->getCustomerId());
        $this->_setCustomerId($response->getCustomerId());
        $this->_setCurrency($response->getCurrency());
        $this->_setValue($response->getValue());
        $this->_setResponseCode($response->getResponseCode());
        $this->_setResponseSummary($response->getResponseSummary());
        $this->_setResponseDetails($response->getResponseDetails());
        $this->_setAuthCode($response->getAuthCode());
        $this->_setStatus($response->getStatus());
        $this->_setEventId($response->getEventId());
        $this->_setErrorCode($response->getErrorCode());
        $this->_setMessage($response->getMessage());
        $this->_setErrorMessageCodes($response->getErrorMessageCodes());
        $this->_setErrors($response->getErrors());
	}
        
    public function getId() {
        return $this->_id;
    }

    public function getDestination() {
        return $this->_destination;
    }

    public function getCustomerId() {
        return $this->_customerId;
    }

    public function getCurrency() {
        return $this->_currency;
    }

    public function getValue() {
        return $this->_value;
    }

    public function getResponseCode() {
        return $this->_responseCode;
    }

    public function getResponseSummary() {
        return $this->_responseSummary;
    }

    public function getResponseDetails() {
        return $this->_responseDetails;
    }

    public function getAuthCode() {
        return $this->_authCode;
    }

    public function getStatus() {
        return $this->_status;
    }

    public function getEventId() {
        return $this->_eventId;
    }

    public function getErrorCode() {
        return $this->_errorCode;
    }

    public function getMessage() {
        return $this->_message;
    }

    public function getErrorMessageCodes() {
        return $this->_errorMessageCodes;
    }

    public function getErrors() {
        return $this->_errors;
    }

    protected function _setId($id) {
        $this->_id = $id;
    }

    protected function _setDestination($destination) {
        $this->_destination = $destination;
    }

    protected function _setCustomerId($customerId) {
        $this->_customerId = $customerId;
    }

    protected function _setCurrency($currency) {
        $this->_currency = $currency;
    }

    protected function _setValue($value) {
        $this->_value = $value;
    }

    protected function _setResponseCode($responseCode) {
        $this->_responseCode = $responseCode;
    }

    protected function _setResponseSummary($responseSummary) {
        $this->_responseSummary = $responseSummary;
    }

    protected function _setResponseDetails($responseDetails) {
        $this->_responseDetails = $responseDetails;
    }

    protected function _setAuthCode($authCode) {
        $this->_authCode = $authCode;
    }

    protected function _setStatus($status) {
        $this->_status = $status;
    }

    protected function _setEventId($eventId) {
        $this->_eventId = $eventId;
    }

    protected function _setErrorCode($errorCode) {
        $this->_errorCode = $errorCode;
    }

    protected function _setMessage($message) {
        $this->_message = $message;
    }

    protected function _setErrorMessageCodes($errorMessageCodes) {
        $this->_errorMessageCodes = $errorMessageCodes;
    }

    protected function _setErrors($errors) {
        $this->_errors = $errors;
    }


}