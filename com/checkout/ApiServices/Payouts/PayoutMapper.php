<?php
/**
 * User: Santiago del Puerto
 * Date: 13/04/2018
 */
namespace com\checkout\ApiServices\Payouts;

class PayoutMapper
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
        $requestPayout = null;
        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }

        if($requestModel) {
            $requestPayout = array();

            if(method_exists($requestModel, 'getValue') && ($value = $requestModel->getValue())) {
                $requestPayout['value'] = $value;
            }

            if(method_exists($requestModel,'getCurrency') && ($currency = $requestModel->getCurrency())) {
                $requestPayout['currency'] = $currency;
            }

            if(method_exists($requestModel,'getDestination') && ($destination = $requestModel->getDestination())) {
                $requestPayout['destination'] = $destination;
            }

            if(method_exists($requestModel,'getFirstName') && ($firstName = $requestModel->getFirstName())) {
                $requestPayout['firstName'] = $firstName;
            }

            if(method_exists($requestModel,'getLastName') && ($lastName = $requestModel->getLastName())) {
                $requestPayout['lastName'] = $lastName;
            }
        }

        return $requestPayout;
    }

}