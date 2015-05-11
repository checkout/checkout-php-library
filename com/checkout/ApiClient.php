<?php
namespace com\checkout;
include "packages/autoload.php";
class ApiClient
{
	private  $_tokenService;
	private  $_chargeService;

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

	}


}
