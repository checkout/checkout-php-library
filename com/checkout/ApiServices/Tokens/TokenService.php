<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 2:41 PM
 */

namespace com\checkout\ApiServices\Tokens;

use com\checkout\ApiServices\BaseServices;
use com\checkout\ApiServices\Charges\ChargesMapper;
use com\checkout\ApiServices\SharedModels\OkResponse;
use com\checkout\ApiServices\Tokens\RequestModels\PaymentTokenUpdate;
use com\checkout\helpers\ApiHttpClient;
use com\checkout\helpers\ApiHttpClientCustomException;

class TokenService extends BaseServices
{
    /**
     * @param RequestModels\PaymentTokenCreate $requestModel
     * @return ResponseModels\PaymentToken
     * @throws ApiHttpClientCustomException
     */
    public function createPaymentToken(RequestModels\PaymentTokenCreate $requestModel)
    {
        $chargeMapper = new ChargesMapper($requestModel);

        $requestPayload = array(
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode' => $this->_apiSetting->getMode(),
            'postedParam' => $chargeMapper->requestPayloadConverter(),
        );

        $processCharge = ApiHttpClient::postRequest($this->_apiUrl->getPaymentTokensApiUri(),
            $this->_apiSetting->getSecretKey(), $requestPayload);

        return new ResponseModels\PaymentToken($processCharge);
    }

    /**
     * @param PaymentTokenUpdate $requestModel
     * @return PaymentTokenUpdate
     * @throws ApiHttpClientCustomException
     */
    public function updatePaymentToken(RequestModels\PaymentTokenUpdate $requestModel)
    {

        $chargeMapper = new ChargesMapper($requestModel);

        $requestPayload = array(
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode' => $this->_apiSetting->getMode(),
            'postedParam' => $chargeMapper->requestPayloadConverter(),
        );

        $updateUri = sprintf($this->_apiUrl->getPaymentTokenUpdateApiUri(), $requestModel->getId());

        $processCharge = ApiHttpClient::putRequest($updateUri,
            $this->_apiSetting->getSecretKey(), $requestPayload);

        return new  OkResponse($processCharge);
    }
}
