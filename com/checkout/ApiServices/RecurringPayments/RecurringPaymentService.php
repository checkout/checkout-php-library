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

        $processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getCreateSinglePlanApiUri(),
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

        $processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getCreateSinglePlanApiUri(),
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
        
        $updatePlanUri = $this->_apiUrl->getUpdatePlanApiUri().'/'.$requestModel->getPlanId();
        $processCharge = \com\checkout\helpers\ApiHttpClient::putRequest($updatePlanUri,
            $this->_apiSetting->getSecretKey(),$requestPayload);

        $responseModel = new  \com\checkout\ApiServices\SharedModels\OkResponse($processCharge);

        return $responseModel;
    }

}