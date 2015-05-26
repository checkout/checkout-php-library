<?php
namespace com\checkout;

class ApiClient
{
	private  $_tokenService;
	private  $_chargeService;
	private  $_cardService;
	private  $_customerService;

    /**
     * @return mixed
     */
    public function customerService()
    {
        return $this->_customerService;
    }


	/**
	 * @return mixed
	 */
	public function chargeService ()
	{
		return $this->_chargeService;
	}

	/**
	 * @return mixed
	 */
	public function tokenService ()
	{
		return $this->_tokenService;
	}

	/**
	 * @return ApiServices\Cards\CardService
	 */
	public function cardService ()
	{
		return $this->_cardService;
	}



	public function __construct($secretKey, $env = 'sandbox' ,$debugMode = false, $connectTimeout = 60, $readTimeout =
	60)
	{
		$appSetting = helpers\AppSetting::getSingletonInstance();
		$appSetting->setSecretKey($secretKey);
		$appSetting->setRequestTimeOut($connectTimeout);
		$appSetting->setReadTimeout($readTimeout);
		$appSetting->setDebugMode($debugMode);
		$appSetting->setMode($env);

		$this->_tokenService = new ApiServices\Tokens\TokenService($appSetting);
		$this->_chargeService = new ApiServices\Charges\ChargeService($appSetting);
		$this->_cardService = new ApiServices\Cards\CardService($appSetting);
		$this->_customerService = new ApiServices\Customers\CustomerService($appSetting);

	}


}
