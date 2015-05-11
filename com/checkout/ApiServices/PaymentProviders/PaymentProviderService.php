<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:22 AM
 */

namespace com\checkout\ApiServices\PaymentProviders;


class PaymentProviderService extends \com\checkout\ApiServices\BaseServices
{
	public function getCardProviderList()
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPublicKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);

		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($this->_apiUrl->getCardProvidersUri(),
			$this->_apiSetting->getPublicKey(),$requestPayload);

		$responseModel = new ResponseModels\CardProviderList($processCharge);

		return $responseModel;
	}

	public function getCardProvider($id)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPublicKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
		$cardProviderByIdUri = $this->_apiUrl->getCardProvidersUri()."/$id";
		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($cardProviderByIdUri,
			$this->_apiSetting->getPublicKey(),$requestPayload);

		$responseModel = new \com\checkout\ApiServices\PaymentProviders\ResponseModels\CardProvider($processCharge);

		return $responseModel;
	}
}