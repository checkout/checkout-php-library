<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/11/2015
 * Time: 2:54 PM
 */

namespace PHPPlugin;


final class CkoMerchantApiClient
{
	static private  $_paymentProviderService;
	static private  $_tokenService;
	static private  $_customerService;
	static private  $_cardService;
	static private  $_chargeService;

	/**
	 * @return mixed
	 */
	public static function getPaymentProviderService (\PHPPlugin\ApiServices\AppApiSetting $apiSetting ,
	                                                  \PHPPlugin\ApiUrls $apiUrl = null, $overide = false)
	{

		if(!self::$_paymentProviderService || $overide) {
			self::$_paymentProviderService = new \PHPPlugin\ApiServices\PaymentProviders\PaymentProviderService($apiSetting,$apiUrl);
		}

		return self::$_paymentProviderService;
	}

	/**
	 * @return mixed
	 */
	public static function getTokenService (\PHPPlugin\ApiServices\AppApiSetting $apiSetting ,
	                                        \PHPPlugin\ApiUrls $apiUrl = null, $overide = false)
	{

		if(!self::$_tokenService || $overide) {
			self::$_tokenService = new \PHPPlugin\ApiServices\Tokens\TokenService($apiSetting,$apiUrl);
		}

		return self::$_tokenService;
	}

	/**
	 * @return mixed
	 */
	public static function getCustomerService (\PHPPlugin\ApiServices\AppApiSetting $apiSetting ,
	                                           \PHPPlugin\ApiUrls $apiUrl = null, $overide = false )
	{
		if(!self::$_customerService || $overide) {
			self::$_customerService = new \PHPPlugin\ApiServices\Customers\CustomerService($apiSetting,$apiUrl);
		}
		return self::$_customerService;
	}


	/**
	 * @param ApiServices\AppApiSetting $apiSetting
	 * @param ApiUrls $apiUrl
	 * @param bool $overide
	 * @return ApiServices\Charges\ChargeService
	 */
	public static function getCardService (\PHPPlugin\ApiServices\AppApiSetting $apiSetting ,
	                                       \PHPPlugin\ApiUrls $apiUrl = null, $overide = false )
	{
		if(!self::$_cardService || $overide) {
			self::$_cardService = new \PHPPlugin\ApiServices\Cards\CardService($apiSetting,$apiUrl);
		}
		return self::$_cardService;
	}

	/**
	 * @param ApiServices\AppApiSetting $apiSetting
	 * @param bool $overide
	 * @return ApiServices\Charges\ChargeService
	 */
	public static function getChargeService (
		\PHPPlugin\ApiServices\AppApiSetting $apiSetting ,
		\PHPPlugin\ApiUrls $apiUrl = null, $overide = false )
	{
		if(!self::$_chargeService || $overide) {
			self::$_chargeService = new \PHPPlugin\ApiServices\Charges\ChargeService($apiSetting,$apiUrl);
		}
		return self::$_chargeService;
	}
}