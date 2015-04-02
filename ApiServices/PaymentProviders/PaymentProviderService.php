<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/23/2015
 * Time: 9:22 AM
 */

namespace PHPPlugin\ApiServices\PaymentProviders;


class PaymentProviderService extends \PHPPlugin\ApiServices\BaseServices
{
	public function getCardProviderList()
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPublicKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
var_dump($this->_apiUrl->getCardProvidersUri());
		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($this->_apiUrl->getCardProvidersUri(),
			$this->_apiSetting->getPublicKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\PaymentProviders\ResponseModels\CardProviderList($processCharge);

		return $responseModel;
	}

	public function getCardProvider($id)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPublicKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
		$cardProviderByIdUri = $this->_apiUrl->getCardProvidersUri()."/$id";
		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($cardProviderByIdUri,
			$this->_apiSetting->getPublicKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\PaymentProviders\ResponseModels\CardProvider($processCharge);

		return $responseModel;
	}
}