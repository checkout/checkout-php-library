<?php

namespace com\checkout\ApiServices\RecurringPayments;

class RecurringPaymentQueryMapper
{
    private $_requestModel;

    /**
     * @param $requestModel
     */
    public  function __construct($requestModel)
    {
        $this->setRequestModel($requestModel);
    }

    /**
     * @return mixed
     */
    public function getRequestModel()
    {
        return $this->_requestModel;
    }

    /**
     * @param mixed $requestModel
     */
    public function setRequestModel($requestModel)
    {
        $this->_requestModel = $requestModel;
    }

    /**
     * @param null $requestModel
     * @return array|null
     */
    public function requestQueryConverter($requestModel = null )
    {
        $requestQuery = null;
        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }

        if($requestModel) {
            $requestQuery = array();

            if(method_exists($requestModel, 'getFromDate') && ($fromDate = $requestModel->getFromDate())) {
                $requestQuery['fromDate'] = $fromDate;
            }

            if(method_exists($requestModel,'getToDate') && ($toDate = $requestModel->getToDate())) {
                $requestQuery['toDate'] = $toDate;
            }

            if(method_exists($requestModel,'getOffset') && ($offset = $requestModel->getOffset())) {
                $requestQuery['offset'] = $offset;
            }

            if(method_exists($requestModel,'getCount') && ($count = $requestModel->getCount())) {
                $requestQuery['count'] = $count;
            }

            if(method_exists($requestModel,'getName') && ($name = $requestModel->getName())) {
                $requestQuery['name'] = $name;
            }

            if(method_exists($requestModel,'getPlanTrackId') && ($planTrackId = $requestModel->getPlanTrackId())) {
                $requestQuery['planTrackId'] = $planTrackId;
            }

            if(method_exists($requestModel,'getAutoCapTime') && ($autoCapTime = $requestModel->getAutoCapTime())) {
                $requestQuery['autoCapTime'] = $autoCapTime;
            }

            if(method_exists($requestModel,'getValue') && ($value = $requestModel->getValue())) {
                $requestQuery['value'] = $value;
            }

            if(method_exists($requestModel,'getStatus') && ($status = $requestModel->getStatus())) {
                $requestQuery['status'] = $status;
            }

            if(method_exists($requestModel,'getPlanId') && ($planId = $requestModel->getPlanId())) {
                $requestQuery['planId'] = $planId;
            }

            if(method_exists($requestModel,'getCardId') && ($cardId = $requestModel->getCardId())) {
                $requestQuery['cardId'] = $cardId;
            }

            if(method_exists($requestModel,'getCustomerId') && ($customerId = $requestModel->getCustomerId())) {
                $requestQuery['customerId'] = $customerId;
            }

            if(method_exists($requestModel,'getCurrency') && ($currency = $requestModel->getCurrency())) {
                $requestQuery['currency'] = $currency;
            }

            if(method_exists($requestModel,'getCycle') && ($cycle = $requestModel->getCycle())) {
                $requestQuery['cycle'] = $cycle;
            }

            if(method_exists($requestModel,'getStartDate') && ($startDate = $requestModel->getStartDate())) {
                $requestQuery['startDate'] = $startDate;
            }

            if(method_exists($requestModel,'getNextRecurringDate') && ($nextRecurringDate = $requestModel->getNextRecurringDate())) {
                $requestQuery['nextRecurringDate'] = $nextRecurringDate;
            }
        }

        return $requestQuery;
    }

}