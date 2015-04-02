<?php
namespace PHPPlugin\ApiServices\Charges;

class ChargeService extends \PHPPlugin\ApiServices\BaseServices
{


	/**
	 * Creates a charge with full card details.
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\CardChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

    public function chargeWithCard(\PHPPlugin\ApiServices\Charges\RequestModels\CardChargeCreate $requestModel)
    {

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

	    $requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

	    );
	    $processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getCardChargesApiUri(),
		    $this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);

		return $responseModel;
    }

	/**
	 * Creates a charge with full card id.
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\CardIdChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithCardId(\PHPPlugin\ApiServices\Charges\RequestModels\CardIdChargeCreate $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getCardChargesApiUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);


		return $responseModel;
	}

	/**
	 * Creates a charge with cardToken.
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\CardTokenChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithCardToken(\PHPPlugin\ApiServices\Charges\RequestModels\CardTokenChargeCreate
	                                    $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getCardTokensApiUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);


		return $responseModel;
	}

	/**
	 * Creates a charge with cardToken.
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\PaymentTokenChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithPaymentToken(\PHPPlugin\ApiServices\Charges\RequestModels\PaymentTokenChargeCreate
	                                    $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPublicKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getChargeWithPaymentTokenUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\PaymentToken($processCharge);


		return $responseModel;
	}


	/**
	 * Creates a charge with Default Customer Card.
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\BaseCharge $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithDefaultCustomerCard(\PHPPlugin\ApiServices\Charges\RequestModels\BaseCharge
	                                       $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getDefaultCardChargesApiUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);


		return $responseModel;
	}
	/**
	 * refund a charge
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\ChargeRefund $requestModel
	 * @return ResponseModels\Charge
	 */

	public function refundCardChargeRequest(\PHPPlugin\ApiServices\Charges\RequestModels\ChargeRefund
	                                              $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$refundUri = sprintf ($this->_apiUrl->getChargeRefundsApiUri(),$requestModel->getChargeId());

		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($refundUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);


		return $responseModel;
	}

	/**
	 * Capture a charge
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\ChargeCapture $requestModel
	 * @return ResponseModels\Charge
	 */

	public function CaptureCardCharge(\PHPPlugin\ApiServices\Charges\RequestModels\ChargeCapture
	                                  $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$refundUri = sprintf ($this->_apiUrl->getCaptureChargesApiUri(),$requestModel->getChargeId());

		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($refundUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);


		return $responseModel;
	}

	/**
	 * Update a charge
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\ChargeUpdate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function UpdateCardCharge(\PHPPlugin\ApiServices\Charges\RequestModels\ChargeUpdate
	                                  $requestModel)
	{

		$chargeMapper = new \PHPPlugin\ApiServices\Charges\ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$refundUri = sprintf ($this->_apiUrl->getUpdateChargesApiUri(),$requestModel->getChargeId());

		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($refundUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);


		return $responseModel;
	}


	/**
	 * retrieve a Charge With a ChargeId
	 * @param \PHPPlugin\ApiServices\Charges\RequestModels\ChargeRetrieve $requestModel
	 * @return ResponseModels\Charge
	 */

	public function retrieveChargeWithChargeId(\PHPPlugin\ApiServices\Charges\RequestModels\ChargeIdChargeRetrieve
	                                 $requestModel)
	{


		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'method'         => 'GET',
		);

		$retrieveChargeWithChargeUri = sprintf ($this->_apiUrl->getRetrieveChargesApiUri(),$requestModel->getChargeId
		());

		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($retrieveChargeWithChargeUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);
		return $responseModel;
	}

	/**
	 * @param RequestModels\ChargeRetrieve $requestModel
	 * @return ResponseModels\Charge
	 */

	public function retrieveChargeWithPaymentToken
	(\PHPPlugin\ApiServices\Charges\RequestModels\ChargeRetrieveWithPaymentToken
	                                               $requestModel)
	{

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'method'        => 'GET',


		);
		$retrieveChargeWithChargeUri = sprintf ($this->_apiUrl->getRetrieveChargesApiUri(),
			$requestModel->getPaymentToken());

		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($retrieveChargeWithChargeUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);
		$responseModel = new \PHPPlugin\ApiServices\Charges\ResponseModels\Charge($processCharge);
		return $responseModel;
	}


}
