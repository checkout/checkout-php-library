<?php

/**
 * CheckoutApi_Client_Validation_GW3
 * CheckoutApi_ validator class for gateway 3.0 base on documentation on http://dev.checkout.com/ref/?shell#cards
 * @package     CheckoutApi
 * @category     Api
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 */
final class CheckoutApi_Client_Validation_GW3 extends CheckoutApi_Lib_Object
{
    /**
     * A helper  method to check if email has been set in the payload and if it's a valid email
     * @param array $postedParam
     * @return boolean
     * CheckoutApi_ check if email valid
     * Simple usage:
     *          CheckoutApi_Client_Validation_GW3::isEmailValid($postedParam);
     */

	public static function isEmailValid($postedParam) 
	{
		$isEmailEmpty = true;	
		$isValidEmail  = false;

		if(isset($postedParam['email'])) {

			$isEmailEmpty = CheckoutApi_Lib_Validator::isEmpty($postedParam['email']);

		}

		if(!$isEmailEmpty) {

			$isValidEmail =  CheckoutApi_Lib_Validator::isValidEmail($postedParam['email']);

		}

		return !$isEmailEmpty && $isValidEmail;

	}

    /**
     * A helper method that is use to check if payload has set a customer id.
     * @param array $postedParam
     * @return boolean
     * check if customer id is valid.
     * Simple usage:
     *          CheckoutApi_Client_Validation_GW3::CustomerIdValid($postedParam);
     */

	public static function isCustomerIdValid($postedParam)
	{
		$isCustomerIdEmpty = true;
		$isValidCustomerId = false;

		if(isset($postedParam['customerId'])) {
			$isCustomerIdEmpty = CheckoutApi_Lib_Validator::isEmpty($postedParam['customerId']);
        }

        if(!$isCustomerIdEmpty) {

			$isValidCustomerId = CheckoutApi_Lib_Validator::isString($postedParam['customerId']);
		}

		return !$isCustomerIdEmpty && $isValidCustomerId;
	}

    /**
     * A helper method that is use to valid if amount is correct in a payload.
     * @param array $postedParam
     * @return boolean
     * CheckoutApi_ check if amount is valid.
     * Simple usage:
     *        CheckoutApi_Client_Validation_GW3::isValueValid($postedParam)
     */
	public static function isValueValid($postedParam)
	{
		$isValid = false;

		if(isset($postedParam['value'])) {

			$amount = $postedParam['value'];

			$isAmountEmpty = CheckoutApi_Lib_Validator::isEmpty($amount);

			
			if(!$isAmountEmpty  ) {
				$isValid = true;

			} 
	
		} 

		return $isValid;
	}

    /**
     * A helper method that is use check if payload has a currency set and if length of currency value is 3
     * @param array $postedParam
     * @return boolean
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::isValidCurrency($postedParam);
     */
	public static function isValidCurrency($postedParam) 
	{
		$isValid = false;

		if(isset($postedParam['currency'])) {

			$currency = $postedParam['currency'];
			$currencyEmpty = CheckoutApi_Lib_Validator::isEmpty($currency);

			if(!$currencyEmpty){
				$isCurrencyLen = CheckoutApi_Lib_Validator::isLength($currency, 3);

				if($isCurrencyLen) {
					$isValid = true;
				}
			}
		}

		return $isValid;
	}

    /**
     * A helper method that check if a name is set in the payload
     * @param array $postedParam
     * @return boolean
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::isNameValid($postedParam);
     */

	public static function isNameValid($postedParam)
	{
		$isValid = false;

		if(isset($postedParam['name'])) {

			$isNameEmpty = CheckoutApi_Lib_Validator::isEmpty($postedParam['name']);
			if(!$isNameEmpty) {

				$isValid = true;
			}
			
		} 

		return $isValid ;
	}

    /**
     * A helper method that check if card number is set in payload.
     * @param array $param
     * @return bool
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::isCardNumberValid($param)
     */
	public static function isCardNumberValid($param)
	{
		$isValid = false;

		if(isset($param['number'])) {

			$errorIsEmpty = CheckoutApi_Lib_Validator::isEmpty($param['number']) ;
			
			if(!$errorIsEmpty) {
				//$this->logError(true, "Card number can not be empty.", array('card'=>$param),false);
				$isValid = true;
			}

		} 

		return $isValid;
	}

    /**
     *  A helper method that check if month is properly set in payload card object
     * @param array $card
     * @return bool
     * Simple usage:
     *          CheckoutApi_Client_Validation_GW3::isMonthValid($card)
     */
	public static function isMonthValid($card)
	{
		$isValid = false;

		if(isset($card['expiryMonth'])) {

			$isExpiryMonthEmpty = CheckoutApi_Lib_Validator::isEmpty($card['expiryMonth'],false);
			
			if(!$isExpiryMonthEmpty && CheckoutApi_Lib_Validator::isInteger($card['expiryMonth']) && ($card['expiryMonth']  > 0 && $card['expiryMonth'] < 13)) {
				$isValid = true;
			} 
		} 

		return $isValid;
	}

    /**
     *  A helper method that check if year is properly set in payload
     * @param array $card
     * @return bool
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::isValidYear($card)
     *
     */
	public static function isValidYear($card)
	{
		$isValid = false;

		if(isset($card['expiryYear'])) {

			$isExpiryYear = CheckoutApi_Lib_Validator::isEmpty($card['expiryYear']);
			
			if( !$isExpiryYear && CheckoutApi_Lib_Validator::isInteger($card['expiryYear']) &&
				( CheckoutApi_Lib_Validator::isLength($card['expiryYear'], 2) ||  CheckoutApi_Lib_Validator::isLength($card['expiryYear'], 4) ) ) {
			
				$isValid = true;
			
			} 
		}

		return $isValid;
	}

    /**
     *  A helper method that check if cvv is properly set in payload
     * @param array $card
     * @return bool
     *
     * Simple usage:
     *          CheckoutApi_Client_Validation_GW3::isValidCvv($card)
     */

	public static function isValidCvv($card)
	{
		$isValid = false;

		if(isset($card['cvv'])) {

			$isCvvEmpty = CheckoutApi_Lib_Validator::isEmpty($card['cvv']);
			
			if(!$isCvvEmpty && CheckoutApi_Lib_Validator::isValidCvvLen($card['cvv'])) {
			
				$isValid = true;
			
			}
		}
		return $isValid;
	}

    /**
     *  A helper method that check if card is properly set in payload. It check if expiry date , card number , cvv and name is set
     * @param $param
     * @return bool
     * Simple usage:
     *          CheckoutApi_Client_Validation_GW3::isCardValid($param)
     */
	public static function  isCardValid($param) 
	{
		$isValid = true;

        if(isset($param['card'])) {
            $card = $param['card'];

            $isNameValid = CheckoutApi_Client_Validation_GW3::isNameValid($card);

            if (!$isNameValid) {

                $isValid = false;
            }

            $isCardNumberValid = CheckoutApi_Client_Validation_GW3::isCardNumberValid($card);

            if (!$isCardNumberValid && ! isset($param['card']['number'])) {

                $isValid = false;
            }

            $isValidMonth = CheckoutApi_Client_Validation_GW3::isMonthValid($card);


            if (!$isValidMonth && !isset($param['card']['expiryMonth'])) {
                $isValid = false;
            }

            $isValidYear = CheckoutApi_Client_Validation_GW3::isValidYear($card);

            if (!$isValidYear && !isset($param['card']['expiryYear'])) {
                $isValid = false;
            }

            $isValidCvv = CheckoutApi_Client_Validation_GW3::isValidCvv($card);

            if (!$isValidCvv && !isset($param['card']['cvv'])) {
                $isValid = false;
            }

            return $isValid;
        }
        return true;

	}

    /**
     *  A helper method that check if card id was set in payload
     * @param $param
     * @return bool
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::CardIdValid($param)
     *
     */
	public static function isCardIdValid($param)
	{
		$isValid = false;
        if(isset($param['card'])) {
		$card = $param['card'];

		if(isset($card['id'])) {

			$isCardIdEmpty = CheckoutApi_Lib_Validator::isEmpty($card['id']);

			if(!$isCardIdEmpty && CheckoutApi_Lib_Validator::isString($card['id']) )
			{
				$isValid = true;
			}
		}

		return $isValid;
        }
        return true;

	}

    /**
     *  A helper method that check if card id is set in payload.
     * The difference between isCardIdValid and isGetCardIdValid is, isCardIdValid check if card id is set
     * in postedparam where as isGetCardIdValid check if configuration pass has a card id
     * @param array $param
     * @return boolean
     * Simple usage:
     *         CheckoutApi_Client_Validation_GW3::isGetCardIdValid($param)
     */
    public static function isGetCardIdValid($param)
    {
        $isValid = false;
        $card = $param['cardId'];

        if(isset($param['cardId'])) {
            $isValid = self::isCardIdValid(array('card'=>$param['cardId']));
        }

        return $isValid;

    }

    /**
     *  A helper method that check in payload if phone number was set
     * @param array $postedParam
     * @return boolean
     *
     */

	public static function isPhoneNoValid($postedParam)
	{
		$isValid = false;

		if(isset($postedParam['phoneNumber'])) {

			$isPhoneEmpty = CheckoutApi_Lib_Validator::isEmpty($postedParam['phoneNumber']);

			if(!$isPhoneEmpty &&  CheckoutApi_Lib_Validator::isString($postedParam['phoneNumber']) ){
				$isValid = true;
			}
		}

		return $isValid;

	}

    /**
     *  A helper method that check that check if token is set in payload
     * @param array $param
     * @return boolean
     * Simple usage:
     *       CheckoutApi_Client_Validation_GW3::isCardToken($param)
     */
	public static function isCardToken($param)
	{
		$isValid = false;

		if(isset($param['cardToken'])){
			$isTokenEmpty = CheckoutApi_Lib_Validator::isEmpty($param['cardToken']);

			if(!$isTokenEmpty) {
				$isValid = true;
			}
		}

		return $isValid;
	}

	/**
	 *  A helper method that check that check if paymentToken is set in payload
	 * @param array $param
	 * @return boolean
	 * Simple usage:
	 *       CheckoutApi_Client_Validation_GW3::isPaymentToken($param)
	 */
	public static function isPaymentToken($param)
	{
		$isValid = false;

		if(isset($param['paymentToken'])){
			$isTokenEmpty = CheckoutApi_Lib_Validator::isEmpty($param['paymentToken']);

			if(!$isTokenEmpty) {
				$isValid = true;
			}
		}

		return $isValid;
	}
    /**
     *  A helper method that check that check if session token is set in payload
     * @param array $param
     * @return boolean
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::isSessionToken($param)
     *
     */

	public static function isSessionToken($param)
	{
		$isValid = false;

		if(isset($param['token'])){
			$isTokenEmpty = CheckoutApi_Lib_Validator::isEmpty($param['token']);

			if(!$isTokenEmpty) {
				$isValid = true;
			}
		}

		return $isValid;
	}

    /**
     * A helper method that check if localpayment object is valid in payload. It check if lppId is set
     * @param array $postedParam
     * @return boolean
     * Simple usage:
     *       CheckoutApi_Client_Validation_GW3::isLocalPyamentHashValid($postedParam)
     */

	public static function isLocalPyamentHashValid($postedParam)
	{
		$isValid = false;

		if(isset($postedParam['localPayment']) && !(CheckoutApi_Lib_Validator::isEmpty($postedParam['localPayment']))) {
			if(isset($postedParam['localPayment']['lppId']) && !(CheckoutApi_Lib_Validator::isEmpty($postedParam['localPayment']['lppId']))) {
				$isValid = true;
			}
		}

		return $isValid;
	}

    /**
     * A helper method that check if a charge id was set in the payload
     * @param array $param
     * @return boolean
     *
     * Simple usage:
     *       CheckoutApi_Client_Validation_GW3::isChargeIdValid($param)
     */
    public static function isChargeIdValid($param)
    {
        $isValid = false;

        if(isset($param['chargeId']) && !(CheckoutApi_Lib_Validator::isEmpty($param['chargeId']))) {
                $isValid = true;
        }
        return $isValid;
    }

    /**
     * A helper method that check provider id is set in payload.
     * @param $param
     * @return bool
     * Simple usage:
     *      CheckoutApi_Client_Validation_GW3::isProvider($param)
     */
    public static function isProvider($param)
    {
        $isValid = false;

        if(isset($param['providerId']) && !(CheckoutApi_Lib_Validator::isEmpty($param['providerId']))) {
            $isValid = true;
        }
        return $isValid;
    }

	/**
	 * A helper method that check plan id is set in payload.
	 * @param $param
	 * @return bool
	 * Simple usage:
	 *      CheckoutApi_Client_Validation_GW3::isPlanIdValid($param)
	 */
	public static function isPlanIdValid($postedParam)
	{
		$isPlanIdEmpty = true;
		$isValidPlanId = false;

		if(isset($postedParam['planId'])) {
			$isPlanIdEmpty = CheckoutApi_Lib_Validator::isEmpty($postedParam['planId']);
		}

		if(!$isPlanIdEmpty) {

			$isValidPlanId = CheckoutApi_Lib_Validator::isString($postedParam['planId']);
		}

		return !$isPlanIdEmpty && $isValidPlanId;
	}

	/**
	 * A helper method that check customer plan id is set in payload.
	 * @param $param
	 * @return bool
	 * Simple usage:
	 *      CheckoutApi_Client_Validation_GW3::isCustomerPlanIdValid($param)
	 */
	public static function isCustomerPlanIdValid($postedParam)
	{
		$isCustomerPlanIdEmpty = true;
		$isValidCustomerPlanId = false;

		if(isset($postedParam['customerPlanId'])) {
			$isCustomerPlanIdEmpty = CheckoutApi_Lib_Validator::isEmpty($postedParam['customerPlanId']);
		}

		if(!$isCustomerPlanIdEmpty) {

			$isValidCustomerPlanId = CheckoutApi_Lib_Validator::isString($postedParam['customerPlanId']);
		}

		return !$isCustomerPlanIdEmpty && $isValidCustomerPlanId;
	}
}