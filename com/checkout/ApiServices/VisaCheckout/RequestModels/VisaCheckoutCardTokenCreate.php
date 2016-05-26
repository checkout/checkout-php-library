<?php

namespace com\checkout\ApiServices\VisaCheckout\RequestModels;

class VisaCheckoutCardTokenCreate
{
    private $_callId            = null;
    private $_includeBinData    = null;
    

    /**
     * @param $callId
     */
    public function setCallId($callId) {
        $this->_callId = $callId;
    }

    /**
     * @return null
     */
    public function getCallId() {
        return $this->_callId;
    }

    /**
     * @param $includeBinData
     */
    public function setIncludeBinData($includeBinData) {
        $this->_includeBinData = $includeBinData;
    }

    /**
     * @return null
     */
    public function getIncludeBinData() {
        return $this->_includeBinData;
    }
}