<?php
namespace com\checkout\ApiServices\Charges;

class ChargeService extends \com\checkout\ApiServices\BaseServices
{


	/**
	 * @param String
	 * @return ResponseModels\Charge
	 */

	public function verifyCharge($paymentToken)
	{

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'method'        => 'GET',


		);


		$retrieveChargeWithChargeUri = sprintf ($this->_apiUrl->getRetrieveChargesApiUri(),
			$paymentToken);

		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($retrieveChargeWithChargeUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);
		return $responseModel;
	}

	/**
	 * Creates a charge with full card details.
	 * @param RequestModels\CardChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithCard(RequestModels\CardChargeCreate $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getCardChargesApiUri(),
			$this->_apiSetting->getSecretKey(),$requestPayload);
      
		$responseModel = new ResponseModels\Charge($processCharge);

		return $responseModel;
	}

	/**
	 * Creates a charge with full card id.
	 * @param RequestModels\CardIdChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithCardId(RequestModels\CardIdChargeCreate $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getCardChargesApiUri(),
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);


		return $responseModel;
	}

	/**
	 * Creates a charge with cardToken.
	 * @param RequestModels\CardTokenChargeCreate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithCardToken(RequestModels\CardTokenChargeCreate
	                                    $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);

		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getCardTokensApiUri(),
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);


		return $responseModel;
	}



	/**
	 * Creates a charge with Default Customer Card.
	 * @param RequestModels\BaseCharge $requestModel
	 * @return ResponseModels\Charge
	 */

	public function chargeWithDefaultCustomerCard(RequestModels\BaseCharge
	                                              $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($this->_apiUrl->getDefaultCardChargesApiUri(),
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);


		return $responseModel;
	}
	/**
	 * refund a charge
	 * @param RequestModels\ChargeRefund $requestModel
	 * @return ResponseModels\Charge
	 */

	public function refundCardChargeRequest(RequestModels\ChargeRefund
	                                        $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$refundUri = sprintf ($this->_apiUrl->getChargeRefundsApiUri(),$requestModel->getChargeId());

		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($refundUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);


		return $responseModel;
	}

    /**
     * void a charge
     * @param RequestModels\ChargeVoid $requestModel
     * @return ResponseModels\Charge
     */

    public function voidCharge($chargeId , RequestModels\ChargeVoid
                                            $requestModel)
    {

        $chargeMapper = new ChargesMapper($requestModel);

        $requestPayload = array (
            'authorization' => $this->_apiSetting->getSecretKey(),
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $chargeMapper->requestPayloadConverter(),

        );
        $refundUri = sprintf ($this->_apiUrl->getVoidChargesApiUri(),$chargeId);

        $processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($refundUri,
            $this->_apiSetting->getSecretKey(),$requestPayload);

        $responseModel = new ResponseModels\Charge($processCharge);


        return $responseModel;
    }

	/**
	 * Capture a charge
	 * @param RequestModels\ChargeCapture $requestModel
	 * @return ResponseModels\Charge
	 */

	public function CaptureCardCharge(RequestModels\ChargeCapture
	                                  $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$refundUri = sprintf ($this->_apiUrl->getCaptureChargesApiUri(),$requestModel->getChargeId());

		$processCharge = \com\checkout\helpers\ApiHttpClient::postRequest($refundUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);


		return $responseModel;
	}

	/**
	 * Update a charge
	 * @param RequestModels\ChargeUpdate $requestModel
	 * @return ResponseModels\Charge
	 */

	public function UpdateCardCharge(RequestModels\ChargeUpdate
	                                 $requestModel)
	{

		$chargeMapper = new ChargesMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $chargeMapper->requestPayloadConverter(),

		);
		$updateUri = sprintf ($this->_apiUrl->getUpdateChargesApiUri(),$requestModel->getChargeId());

		$processCharge = \com\checkout\helpers\ApiHttpClient::putRequest($updateUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new \com\checkout\ApiServices\SharedModels\OkResponse($processCharge);


		return $responseModel;
	}


	/**
	 * retrieve a Charge With a ChargeId
	 * @param RequestModels\ChargeRetrieve $requestModel
	 * @return ResponseModels\Charge
	 */

	public function getCharge($chargeId)
	{


		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'method'         => 'GET',
		);

		$retrieveChargeWithChargeUri = sprintf ($this->_apiUrl->getRetrieveChargesApiUri(),$chargeId);

		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($retrieveChargeWithChargeUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\Charge($processCharge);
		return $responseModel;
	}


	/**
	 * retrieve a Charge History With a ChargeId
	 * @param RequestModels\ChargeRetrieve $requestModel
	 * @return ResponseModels\ChargeHistory
	 */

	public function getChargeHistory($chargeId)
	{


		$requestPayload = array (
			'authorization' => $this->_apiSetting->getSecretKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'method'         => 'GET',
		);

		$retrieveChargeHistoryWithChargeUri = sprintf ($this->_apiUrl->getRetrieveChargeHistoryApiUri(),$chargeId);

		$processCharge = \com\checkout\helpers\ApiHttpClient::getRequest($retrieveChargeHistoryWithChargeUri,
			$this->_apiSetting->getSecretKey(),$requestPayload);

		$responseModel = new ResponseModels\ChargeHistory($processCharge);
		return $responseModel;
	}


}
