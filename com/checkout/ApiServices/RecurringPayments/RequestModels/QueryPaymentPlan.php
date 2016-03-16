<?php
namespace  com\checkout\ApiServices\RecurringPayments\RequestModels;

class QueryPaymentPlan
{
	private $_fromDate      = null;
    private $_toDate        = null;
    private $_offset      = null;
    private $_count    = null;
    private $_name    = null;
    private $_planTrackId     = null;
    private $_autoCapTime     = null;
    private $_value     = null;
    private $_status     = null;
    /**
     * @param $fromDate
     */
    public function setFromDate($fromDate) {
        $this->_fromDate = $fromDate;
    }

    /**
     * @return null
     */
    public function getFromDate() {
        return $this->_fromDate;
    }

    /**
     * @param $toDate
     */
    public function setToDate($toDate) {
        $this->_toDate = $toDate;
    }

    /**
     * @return null
     */
    public function getToDate() {
        return $this->_toDate;
    }

    /**
     * @param $offset
     */
    public function setOffset($offset) {
        $this->_offset = $offset;
    }

    /**
     * @return null
     */
    public function getOffset() {
        return $this->_offset;
    }

    /**
     * @param $count
     */
    public function setCount($count) {
        $this->_count = $count;
    }

    /**
     * @return null
     */
    public function getCount() {
        return $this->_count;
    }

    /**
     * @param $name
     */
    public function setName($name) {
        $this->_name = $name;
    }

    /**
     * @return null
     */
    public function getName() {
        return $this->_name;
    }

    /**
     * @param $planTrackId
     */
    public function setPlanTrackId($planTrackId) {
        $this->_planTrackId = $planTrackId;
    }

    /**
     * @return null
     */
    public function getPlanTrackId() {
        return $this->_planTrackId;
    }

    /**
     * @param $autoCapTime
     */
    public function setAutoCapTime($autoCapTime) {
        $this->_autoCapTime = $autoCapTime;
    }

    /**
     * @return null
     */
    public function getAutoCapTime() {
        return $this->_autoCapTime;
    }

    /**
     * @param $value
     */
    public function setValue($value) {
        $this->_value = $value;
    }

    /**
     * @return null
     */
    public function getValue() {
        return $this->_value;
    }

    /**
     * @param $status
     */
    public function setStatus($status) {
        $this->_status = $status;
    }

    /**
     * @return null
     */
    public function getStatus() {
        return $this->_status;
    }

}