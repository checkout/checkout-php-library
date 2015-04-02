<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 2:41 PM
 */

namespace PHPPlugin\ApiServices\Tokens;


class TokenService extends \PHPPlugin\ApiServices\BaseServices
{
	public function createPaymentToken(\PHPPlugin\ApiServices\Tokens\RequestModels\PaymentTokenCreate $requestModel)
	{
		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getPaymentTokensApiUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Tokens\ResponseModels\PaymentToken($processCharge);

		return $responseModel;
	}

	public function createCardToken(\PHPPlugin\ApiServices\Tokens\RequestModels\CardTokenCreate $requestModel)
	{
		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPublicKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getCardTokensApiUri(),
			$this->_apiSetting->getPublicKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Tokens\ResponseModels\CardToken($processCharge);

		return $responseModel;

	}
}