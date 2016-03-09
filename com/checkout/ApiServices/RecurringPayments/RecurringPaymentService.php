<?php

namespace com\checkout\ApiServices\RecurringPayments;

class RecurringPaymentService extends \com\checkout\ApiServices\BaseServices
{
    /**
     * Creates a new payment plan
     * @param RequestModels\BaseRecurringPayment $requestModel
     * @return ResponseModels\RecurringPayment
     */

    public function createSinglePlan(RequestModels\BaseRecurringPayment $requestModel)
    {

        $recurringPaymentMapper = new RecurringPaymentMapper($requestModel);

        $requestPayload = array (
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $recurringPaymentMapper->requestPayloadConverter(),

        );

        $processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getRecurringPaymentsApiUri(),
            $this->_apiSetting->getSecretKey(),$requestPayload);
      
        $responseModel = new ResponseModels\RecurringPayment($processCharge);

        return $responseModel;
    }

    public function createMultiplePlans($plansArray)
    {
        $temporaryArray;

        foreach($plansArray as $singlePlan)
        {
            $recurringPaymentMapper = new RecurringPaymentMapper($singlePlan);
            $temporaryArray[] = $recurringPaymentMapper->requestPayloadConverter()['paymentPlans'][0];
        }
        
        $arrayToSubmit['paymentPlans'] = $temporaryArray;

        $requestPayload = array (
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $arrayToSubmit,

        );

        $processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getRecurringPaymentsApiUri(),
            $this->_apiSetting->getSecretKey(),$requestPayload);
      
        $responseModel = new ResponseModels\RecurringPayment($processCharge);

        return $responseModel;
    }

    public function updatePlan(RequestModels\PlanUpdate $requestModel)
    {

        $recurringPaymentMapper = new RecurringPaymentMapper($requestModel);

        $requestPayload = array (
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $recurringPaymentMapper->requestPayloadConverter()['paymentPlans'][0],

        );
        
        $updatePlanUri = $this->_apiUrl->getRecurringPaymentsApiUri().'/'.$requestModel->getPlanId();
        $processCharge = \com\checkout\helpers\ApiHttpClient::putRequest($updatePlanUri,
            $this->_apiSetting->getSecretKey(),$requestPayload);

        $responseModel = new  \com\checkout\ApiServices\SharedModels\OkResponse($processCharge);

        return $responseModel;
    }

    public function deletePlan($customerId)
    {

        $requestPayload = array (
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode'          => $this->_apiSetting->getMode(),

        );
        $deletePlanUri = $this->_apiUrl->getRecurringPaymentsApiUri().'/'.$planId;
        $processCharge = \com\checkout\helpers\ApiHttpClient::deleteRequest($deletePlanUri,
            $this->_apiSetting->getSecretKey(),$requestPayload);

        $responseModel = new \com\checkout\ApiServices\SharedModels\OkResponse($processCharge);

        return $responseModel;
    }

    public function getPlan($customerId)
    {

        $requestPayload = array (
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode'          => $this->_apiSetting->getMode(),

        );
        $getCustomerUri = $this->_apiUrl->getRecurringPaymentsApiUri().'/'.$customerId;
        $processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($getCustomerUri,
            $this->_apiSetting->getSecretKey(),$requestPayload);

        $responseModel = new ResponseModels\Customer($processCharge);

        return $responseModel;
    }

}