<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 2:41 PM
 */

namespace com\checkout\ApiServices\Tokens;


class TokenService extends \com\checkout\ApiServices\BaseServices
{
	public function createPaymentToken(RequestModels\PaymentTokenCreate $requestModel)
	{
		$chargeMapper = new \com\checkout\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getPaymentTokensApiUri(),
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\PaymentToken($processCharge);

		return $responseModel;
	}


}