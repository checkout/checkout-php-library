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


    public function requestPayloadConverter($requestModel = null )
    {
        $requestPayload = null;
        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }
        if($requestModel) {
            $requestPayload = array ();

            $requestSinglePaymentPlan = array();

            if (method_exists($requestModel, 'getName') && ($name = $requestModel->getName())) {
                $requestSinglePaymentPlan['name'] = $name;
            }

            if (method_exists($requestModel, 'getPlanTrackId') && ($planTrackId = $requestModel->getPlanTrackId())) {
                $requestSinglePaymentPlan['planTrackId'] = $planTrackId;
            }

            if (method_exists($requestModel, 'getAutoCapTime') && ($autoCapTime = $requestModel->getAutoCapTime())) {
                $requestSinglePaymentPlan['autoCapTime'] = $autoCapTime;
            }

            if (method_exists($requestModel, 'getCurrency') && ($currency = $requestModel->getCurrency())) {
                $requestSinglePaymentPlan['currency'] = $currency;
            }

            if (method_exists($requestModel, 'getValue') && ($value = $requestModel->getValue())) {
                $requestSinglePaymentPlan['value'] = $value;
            }
            if (method_exists($requestModel, 'getCycle') && ($cycle = $requestModel->getCycle())) {
                $requestSinglePaymentPlan['cycle'] = $cycle;
            }

            if (method_exists($requestModel, 'getRecurringCount') && ($recurringCount = $requestModel->getRecurringCount())) {
                $requestSinglePaymentPlan['recurringCount'] = $recurringCount;
            }

            if (method_exists($requestModel, 'getPlanId') && ($planId = $requestModel->getPlanId())) {
                $requestSinglePaymentPlan['planId'] = $planId;
            }

            if (method_exists($requestModel, 'getStartDate') && ($startDate = $requestModel->getStartDate())) {
                $requestSinglePaymentPlan['startDate'] = $startDate;
            }

            $requestPayload['paymentPlans'][] = $requestSinglePaymentPlan;
        }

        return $requestPayload;

    }

}