<?php

namespace com\checkout\ApiServices\VisaCheckout;

class VisaCheckoutService extends \com\checkout\ApiServices\BaseServices
{
    /**
     * @param RequestModels\VisaCheckoutCardTokenCreate $requestModel
     * @return ResponseModels\VisaCheckoutCardToken
     * @throws \Exception
     */
    public function createVisaCheckoutCardToken(RequestModels\VisaCheckoutCardTokenCreate $requestModel) {
        $visaCheckoutMapper    = new VisaCheckoutMapper($requestModel);
        $visaCheckoutUri       = $this->_apiUrl->getVisaCheckoutCardTokenApiUri();
        $secretKey          = $this->_apiSetting->getSecretKey();

        // echo var_dump($visaCheckoutUri);
        $requestVisaCheckout   = array (
            'authorization' => $secretKey,
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $visaCheckoutMapper->requestPayloadConverter(),

        );

        $processVisaCheckout   = \com\checkout\helpers\ApiHttpClient::postRequest($visaCheckoutUri, $secretKey, $requestVisaCheckout);
        $responseModel      = new ResponseModels\VisaCheckoutCardToken($processVisaCheckout);

        return $responseModel;
    }

}