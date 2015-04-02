<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/18/2015
 * Time: 9:35 AM
 */

namespace PHPPlugin\ApiServices\Cards;


class CardService extends  \PHPPlugin\ApiServices\BaseServices
{
	public function createCard(\PHPPlugin\ApiServices\Cards\RequestModels\CardCreate $requestModel)
	{
		$cardMapper = new \PHPPlugin\ApiServices\Cards\CardMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $cardMapper->requestPayloadConverter(),

		);

		$createCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$requestModel->getCustomerId());
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($createCardUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Cards\ResponseModels\Card($processCharge);
		return $responseModel;
	}


	public function getCard($customerId,$cardId)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$customerId).'/'.$cardId;

		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($getCardUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Cards\ResponseModels\Card($processCharge);
		return $responseModel;
	}

	public function updateCard(\PHPPlugin\ApiServices\Cards\RequestModels\CardUpdate $requestModel)
	{
		$cardMapper = new \PHPPlugin\ApiServices\Cards\CardMapper($requestModel);
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $cardMapper->requestPayloadConverterCard(),

		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$requestModel->getCustomerId()).'/'.$requestModel->getCardId();

		$processCharge = \PHPPlugin\ApiHttpClient::putRequest($getCardUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);
		$responseModel = new \PHPPlugin\ApiServices\Cards\ResponseModels\Card($processCharge);
		return $responseModel;
	}

	public function deleteCard($customerId,$cardId)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$customerId).'/'.$cardId;

		$processCharge = \PHPPlugin\ApiHttpClient::deleteRequest($getCardUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\SharedModels\DeleteResponse($processCharge);
		return $responseModel;
	}

	public function getCartList($customerId)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$customerId);

		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($getCardUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Cards\ResponseModels\CardList($processCharge);
		return $responseModel;
	}
}