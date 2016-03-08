<?php

namespace com\checkout\ApiServices\RecurringPayments;

class RecurringPaymentMapper
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
    public function requestPayloadConverter($requestModel = null )
    {
        $requestPayload = null;
        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }
        if($requestModel) {
            $requestPayload = array ();

            if(method_exists($requestModel,'getName') && ($name = $requestModel->getName())) {
                $requestPayload['name'] = $name;
            }

            if(method_exists($requestModel,'getPlanTrackId') && ($planTrackId = $requestModel->getPlanTrackId())) {
                $requestPayload['planTrackId'] = $planTrackId;
            }
            
            if(method_exists($requestModel,'getAutoCapTime') && ($autoCapTime = $requestModel->getAutoCapTime())) {
                $requestPayload['autoCapTime'] = $autoCapTime;
            }
            
            if(method_exists($requestModel,'getCurrency') && ($currency = $requestModel->getCurrency())) {
                $requestPayload['currency'] = $currency;
            }

            if(method_exists($requestModel,'getValue') && ($value = $requestModel->getValue())) {
                $requestPayload['value'] = $value;
            }
            if(method_exists($requestModel,'getCycle') && ($cycle = $requestModel->getCycle())) {
                $requestPayload['cycle'] = $cycle;
            }

            if(method_exists($requestModel,'getRecurringCount') && ($recurringCount = $requestModel->getRecurringCount())) {
                $requestPayload['recurringCount'] = $recurringCount;
            }

        }

        return $requestPayload;

}