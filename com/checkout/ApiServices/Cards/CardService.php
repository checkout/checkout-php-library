<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/18/2015
 * Time: 9:35 AM
 */

namespace com\checkout\ApiServices\Cards;


class CardService extends  \com\checkout\ApiServices\BaseServices
{
	public function createCard(RequestModels\CardCreate $requestModel)
	{
		$cardMapper = new CardMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $cardMapper->requestPayloadConverter(),

		);

		$createCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$requestModel->getCustomerId());
		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($createCardUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Card($processCharge);
		return $responseModel;
	}


	public function getCard($customerId,$cardId)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$customerId).'/'.$cardId;

		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($getCardUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Card($processCharge);
		return $responseModel;
	}

	public function updateCard(\com\checkout\ApiServices\Cards\RequestModels\CardUpdate $requestModel)
	{
		$cardMapper = new CardMapper($requestModel);
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $cardMapper->requestPayloadConverterCard(),

		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$requestModel->getCustomerId()).'/'.$requestModel->getCardId();

		$processCharge = \com\checkout\helpers\ApiHttpClient::putRequest($getCardUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);
		$responseModel = new \com\checkout\ApiServices\SharedModels\OkResponse($processCharge);
		return $responseModel;
	}

	public function deleteCard($customerId,$cardId)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$customerId).'/'.$cardId;

		$processCharge = \com\checkout\helpers\ApiHttpClient::deleteRequest($getCardUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new \com\checkout\ApiServices\SharedModels\OkResponse($processCharge);
		return $responseModel;
	}

	public function getCartList($customerId)
	{
		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);

		$getCardUri = sprintf($this->_apiUrl->getCardsApiUri(),$customerId);

		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($getCardUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\CardList($processCharge);
		return $responseModel;
	}
}