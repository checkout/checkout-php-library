<?php

/**
 * CheckoutApi_Api
 *
 * PHP Version 5.2
 * @category     Api
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 */

/**
 * Class final  CheckoutApi_Api.
 * This class is responsible in creating instance of payment gateway interface(CheckoutApi_Client_Client).
 *
 * The simplest usage would be:
 *     $Api = CheckoutApi_Api::getApi();
 *
 * This will create an instance a singleton instance of CheckoutApi_Client_Client
 * The default gateway is CheckoutApi_Client_ClientGW3.
 *
 * If you need create instance of other gateways, you can do do those steps:
 *
 *     $Api = CheckoutApi_Api::getApi(array(),'CheckoutApi_Client_Client[GATEWAYNAME]');
 *
 *  If you need initialise some configuration before hand:
 *
 *     $config = array('config1' => 'value1', 'config2' => 'value2');
 *     $Api = CheckoutApi_Api::getApi($config);
 */

final class CheckoutApi_Api 
{
    /** @var string $_apiClass  The name of the gateway to be used  */
	private static $_apiClass = 'CheckoutApi_Client_ClientGW3';


    /**
     * Helper static function to get singleton instance of a gateway interface.
     * @param array $arguments A set arguments for initialising class constructor.
     * @param null|string $_apiClass Gateway class name.
     * @return CheckoutApi_Client_Client An singleton instance of CheckoutApi_Client_Client
     * @throws Exception
     */

    public static function getApi(array $arguments = array(),$_apiClass = null)
    {
    	if($_apiClass) {
    		self::setApiClass($_apiClass);
    	}
                
        //Initialise the exception library
        $exceptionState = CheckoutApi_Lib_Factory::getSingletonInstance('CheckoutApi_Lib_ExceptionState');
        $exceptionState->setErrorState(false);
        
        return CheckoutApi_Lib_Factory::getSingletonInstance(self::getApiClass(),$arguments);
    }

    /**
     * Helpper static function for setting  for $_apiClass.
     * @param CheckoutApi_Client_Client $apiClass gateway interface name
     */

    public static function setApiClass($apiClass)
    {
    	self::$_apiClass = $apiClass;
    }

    /**
     * Helper static function  for retriving value of $_apiClass.
     * @return CheckoutApi_Client_Client  $_apiClass
     */

    public static function getApiClass()
    {
    	return self::$_apiClass;
    }
}