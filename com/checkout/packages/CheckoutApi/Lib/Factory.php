<?php 
/**
 * A class that given a class name, it generate the coresponding object
 * @package     CheckoutApi
 * @category     Api
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 */

final class CheckoutApi_Lib_Factory extends CheckoutApi_Lib_Object
{

    /** @var array $_registry an array holding instance of object */
	static private $_registry = array();

    /**
     * @param string $className class name
     * @return mixed
     * CheckoutApi_ create instance
     * Simple usage:
     *      CheckoutApi_Lib_Factory::getInstance('CheckoutApi_Client_ClientGW3');
     */
	public static function getInstance($className, array $arguments = array())
	{
		return new $className($arguments);
	}

    /**
     * This helper method create a singleton object , given the name of the class
     * @param $className
     * @param array $arguments arguemnet for class constructor
     * @return mixed
     * @throws Exception
     * Simple usage:
     *           CheckoutApi_Lib_Factory::getSingletonInstance('CheckoutApi_Client_ClientGW3');
     */
       
    public static function getSingletonInstance($className, array $arguments = array())
    {	
    	
    	$registerKey = $className;
    
        if (!isset(self::$_registry[$registerKey])) {

        	if(class_exists($className)) {
            	self::$_registry[$registerKey] = new $className($arguments);
            	
        	}else {
 
        		throw new Exception ('Invalid class name:: ' .$className."(".print_r($arguments,1).')');
        	}
        }


        return  self::$_registry[$registerKey];
    }
	

}