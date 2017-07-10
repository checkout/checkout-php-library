<?php

namespace com\checkout\ApiServices\VisaCheckout;

class VisaCheckoutService extends \com\checkout\ApiServices\BaseServices
{
    /**
     * @param RequestModels\VisaCheckoutCardTokenCreate $requestModel
     * @return ResponseModels\VisaCheckoutCardToken
     * @throws \Exception
     */
    public function createVisaCheckoutCardToken(RequestModels\VisaCheckoutCardTokenCreate $requestModel, $publicKey) {
        $visaCheckoutMapper    = new VisaCheckoutMapper($requestModel);
        $visaCheckoutUri       = $this->_apiUrl->getVisaCheckoutCardTokenApiUri();

        // echo var_dump($visaCheckoutUri);
        $requestVisaCheckout   = array (
            'authorization' => $publicKey,
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $visaCheckoutMapper->requestPayloadConverter(),

        );

        $processVisaCheckout   = \com\checkout\helpers\ApiHttpClient::postRequest($visaCheckoutUri, $publicKey, $requestVisaCheckout);
        $responseModel      = new ResponseModels\VisaCheckoutCardToken($processVisaCheckout);

        return $responseModel;
    }

}