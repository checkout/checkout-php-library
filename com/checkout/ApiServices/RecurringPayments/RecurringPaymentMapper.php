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
        $requestSinglePaymentPlan = null;

        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }
        if($requestModel) {
            $requestPayload = array ();
            $requestSinglePaymentPlan = array ();

            if(method_exists($requestModel,'getName') && ($name = $requestModel->getName())) {
                $requestSinglePaymentPlan['name'] = $name;
            }

            if(method_exists($requestModel,'getPlanTrackId') && ($planTrackId = $requestModel->getPlanTrackId())) {
                $requestSinglePaymentPlan['planTrackId'] = $planTrackId;
            }
            
            if(method_exists($requestModel,'getAutoCapTime') && ($autoCapTime = $requestModel->getAutoCapTime())) {
                $requestSinglePaymentPlan['autoCapTime'] = $autoCapTime;
            }
            
            if(method_exists($requestModel,'getCurrency') && ($currency = $requestModel->getCurrency())) {
                $requestSinglePaymentPlan['currency'] = $currency;
            }

            if(method_exists($requestModel,'getValue') && ($value = $requestModel->getValue())) {
                $requestSinglePaymentPlan['value'] = $value;
            }
            if(method_exists($requestModel,'getCycle') && ($cycle = $requestModel->getCycle())) {
                $requestSinglePaymentPlan['cycle'] = $cycle;
            }

            if(method_exists($requestModel,'getRecurringCount') && ($recurringCount = $requestModel->getRecurringCount())) {
                $requestSinglePaymentPlan['recurringCount'] = $recurringCount;
            }

            if(method_exists($requestModel,'getPlanId') && ($planId = $requestModel->getPlanId())) {
                $requestSinglePaymentPlan['planId'] = $planId;
            }

            if(method_exists($requestModel,'getStartDate') && ($startDate = $requestModel->getStartDate())) {
                $requestSinglePaymentPlan['startDate'] = $startDate;
            }

            if(method_exists($requestModel,'getStatus') && ($status = $requestModel->getStatus())) {
                $requestSinglePaymentPlan['status'] = $status;
            }

            if(method_exists($requestModel,'getCardId') && ($cardId = $requestModel->getCardId())) {
                $requestSinglePaymentPlan['cardId'] = $cardId;
            }

            $requestPayload['paymentPlans'][] = $requestSinglePaymentPlan;

            if(method_exists($requestModel,'getBaseCardCreate') ) {
                if ($requestModel->getBaseCardCreate () != null)
                {
                    $cardBase = $requestModel->getBaseCardCreate ();
                    if ( $billingAddress = $cardBase->getBillingDetails () ) {
                        $billingAddressConfig = array (
                            'addressLine1' => $billingAddress->getAddressLine1 () ,
                            'addressLine2' => $billingAddress->getAddressLine2 () ,
                            'postcode'     => $billingAddress->getPostcode () ,
                            'country'      => $billingAddress->getCountry () ,
                            'city'         => $billingAddress->getCity () ,
                            'state'        => $billingAddress->getState () ,
                        );
                        if($billingAddress->getPhone () != null){
                          $billingAddressConfig = array_merge_recursive ( $billingAddressConfig , 
                              array (
                                'phone' => $billingAddress->getPhone()->getPhoneDetails() 
                              )
                          );
                        }
                        $requestPayload[ 'card' ][ 'billingDetails' ] = $billingAddressConfig;
                    }

                    if ( $name = $cardBase->getName () ) {
                        $requestPayload[ 'card' ][ 'name' ] = $name;
                    }

                    if ( $number = $cardBase->getNumber () ) {
                        $requestPayload[ 'card' ][ 'number' ] = $number;
                    }

                    if ( $expiryMonth = $cardBase->getExpiryMonth () ) {
                        $requestPayload[ 'card' ][ 'expiryMonth' ] = $expiryMonth;
                    }

                    if ( $expiryYear = $cardBase->getExpiryYear () ) {
                        $requestPayload[ 'card' ][ 'expiryYear' ] = $expiryYear;
                    }

                    if ( $cvv = $cardBase->getCvv () ) {
                        $requestPayload[ 'card' ][ 'cvv' ] = $cvv;
                    }
                }
            }

            if(method_exists($requestModel,'getBaseChargeCreate') ) {
                if ($requestModel->getBaseChargeCreate () != null)
                {
                    $chargeBase = $requestModel->getBaseChargeCreate ();

                    if ( $email = $chargeBase->getEmail () ) {
                        $requestPayload[ 'email' ] = $email;
                    }

                    if ( $description = $chargeBase->getDescription () ) {
                        $requestPayload[ 'description' ] = $description;
                    }

                    if ( $value = $chargeBase->getValue () ) {
                        $requestPayload[ 'value' ] = $value;
                    }

                    if ( $currency = $chargeBase->getCurrency () ) {
                        $requestPayload[ 'currency' ] = $currency;
                    }

                    if ( $trackId = $chargeBase->getTrackId () ) {
                        $requestPayload[ 'trackId' ] = $trackId;
                    }
                }
            }

            if(method_exists($requestModel,'getTransactionIndicator') && ($transactionIndicator = $requestModel->getTransactionIndicator())) {
                $requestPayload['transactionIndicator'] = $transactionIndicator;
            }


        }


        return $requestPayload;
    }

}