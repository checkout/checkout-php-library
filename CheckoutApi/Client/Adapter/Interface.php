<?php 
/**
* This class is used as signature  for all current and future adapters
 * @package     CheckoutApi
 * @category     Adapter
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
**/
interface CheckoutApi_Client_Adapter_Interface 
{
	/**
	* CheckoutApi_ Read respond on the server
	* 
	* @return object
	**/

	public function request();
    
    /**
    *CheckoutApi_ Close all open connections and release all set variables
    **/

	public function close();

    /**
    * CheckoutApi_ Open a connection to server/URI
    * @return resource
    **/

	public function connect();

	/**
    *  Set parameter $_config value
    * @param array $array config array
    *
    * @return mixed
    * 
    **/

	public function setConfig($array = array());

	/**
    *  Return parameter value in $_config variable
    * @param string $key config name to retrive
    * @return  mixed
    **/

	public function getConfig($key = null);
}