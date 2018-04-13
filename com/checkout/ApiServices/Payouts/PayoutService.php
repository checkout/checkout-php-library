<?php
/**
 * User: Santiago del Puerto
 * Date: 13/04/2018
 */

namespace com\checkout\ApiServices\Payouts;


class PayoutService extends \com\checkout\ApiServices\BaseServices
{

	public function createPayout(RequestModels\PayoutCreate $requestModel)
	{

		$payoutMapper = new PayoutMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $payoutMapper->requestPayloadConverter(),

		);

		$processPayout = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getPayoutsApiUri(),
		$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Payout($processPayout);

		return $responseModel;
	}

}