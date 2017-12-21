<?php

/**
 *  CheckoutApi_Lib_Validator
 *  class for validation
 * @package     CheckoutApi
 * @category     Api
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 */
final class CheckoutApi_Lib_Validator extends CheckoutApi_lib_Object
{

    /**
     * A helper method that check if variable is empty
     * @param mixed $var
     * @return boolean
     * Simple usage:
     *       CheckoutApi_Lib_Validator::isEmpty($var)
     */
	public static function isEmpty($var) 
	{	
		$toReturn = false;

		if(is_array($var) && empty($var)) {
			$toReturn = true;
		}

		if(is_string($var) && ($var =='' || is_null($var))) {
			$toReturn = true;
		}

		if(is_integer($var) && ($var =='' || is_null($var)) ) {
			$toReturn = true;
		}

		if(is_float($var) && ($var =='' || is_null($var)) ) {
			$toReturn = true;
		}

		return $toReturn;
	}

    /**
     * A helper method that check if $int integer
     * @param mixed $int
     * @return boolean
     * Simple usage:
     *       CheckoutApi_Lib_Validator::isInteger($int)
     */

	public static function isInteger($int) 
	{
		return is_integer($int);
	}

    /**
     * A helper method that check if $string is a string
     * @param $string
     * @return bool
     * Simple usage:
     *       CheckoutApi_Lib_Validator::isString($var)
     */

	public static function isString($string)
	{
		return is_string($string);
	}

    /**
     * A helper method that check if $string is a float
     * @param mixed $string
     * @return bool
     * Simple usage:
     *       CheckoutApi_Lib_Validator::isFloat($string)
     *
     */

	public static function isFloat($string)
	{
		return is_float($string);
	}

    /**
     *   A helper method that check if $email is a valid email
     * @param mixed $email
     * @return int
     * CheckoutApi_ validate email
     * @todo find a better regex or build one for validate email
     */
	public static function isValidEmail($email) 
	{
		$emailReg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/";
		$email = strtolower($email);
		return preg_match ($emailReg,$email);
	}

    /**
     *   A helper method that check if string match length
     * @param string $var
     * @param integer $length
     * @return boolean
     *
     */

	public static function isLength($var, $length)
	{
		

		if(is_array($var)  ) {
			return sizeof($var) == $length;

		} else {
			return strlen($var) == $length;

		}

	}

    /**
     *   A helper method that check if ccv is in correct format
     * @param string $cvv
     * @return true

     */
	public static function isValidCvvLen($cvv)
	{
		$pattern = '/^[0-9]{3,4}$/';
		return preg_match($pattern, $cvv)?true:false;
	}
}