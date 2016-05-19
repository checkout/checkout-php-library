<?php
/**
 * Created by PhpStorm.
 * Date: 22.12.2015
 * Time: 12:57
 */
namespace com\checkout\ApiServices\VisaCheckout;

class VisaCheckoutMapper
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
        $requestVisaCheckout = null;
        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }

        if($requestModel) {
            $requestVisaCheckout = array();

            if(method_exists($requestModel, 'getCallId') && ($callId = $requestModel->getCallId())) {
                $requestVisaCheckout['callId'] = $callId;
            }

            if(method_exists($requestModel,'getIncludeBinData') && ($includeBinData = $requestModel->getIncludeBinData())) {
                $requestVisaCheckout['includeBinData'] = $includeBinData;
            }
        }

        return $requestVisaCheckout;
    }

}