<?php
namespace com\checkout;

class ApiClient
{
	private  $_tokenService;
	private  $_chargeService;
	private  $_cardService;
	private  $_customerService;
	private  $_payoutService;
	private  $_reportingService;
	private  $_recurringPaymentService;
	private  $_visaCheckoutService;

	/**
	 * @return ApiServices\Customers\CustomerService
	 */
    public function customerService()
    {
        return $this->_customerService;
    }
    
	/**
	 * @return ApiServices\Payouts\PayoutService
	 */
	public function payoutService()
	{
            return $this->_payoutService;
	}

	/**
	 * @return ApiServices\Charges\ChargeService
	 */
	public function chargeService ()
	{
		return $this->_chargeService;
	}

	/**
	 * @return ApiServices\Tokens\TokenService
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

	/**
	 * @return ApiServices\Reporting\ReportingService
	 */
	public function reportingService ()
	{
		return $this->_reportingService;
	}

	/**
	 * @return ApiServices\RecurringPayments\RecurringPaymentService
	 */
	public function recurringPaymentService ()
	{
		return $this->_recurringPaymentService;
	}

	/**
	 * @return ApiServices\VisaCheckout\VisaCheckoutService
	 */
	public function visaCheckoutService ()
	{
		return $this->_visaCheckoutService;
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
		$this->_payoutService = new ApiServices\Payouts\PayoutService($appSetting);
		$this->_reportingService = new ApiServices\Reporting\ReportingService($appSetting);
		$this->_recurringPaymentService = new ApiServices\RecurringPayments\RecurringPaymentService($appSetting);
		$this->_visaCheckoutService = new ApiServices\VisaCheckout\VisaCheckoutService($appSetting);

	}
}
