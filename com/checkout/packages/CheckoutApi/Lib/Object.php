<?php

/**
 *  CheckoutApi_Lib_Object
 * This class is a base class for the other class
 * it provide common feature that exist between other classes
 * @package     CheckoutApi
 * @category     Api
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 */
class CheckoutApi_Lib_Object implements ArrayAccess
{

    /** @var array $_config an array that containt all configuration for a class */
    protected $_config = array();


    /**
     * A method that get the configuration for an object
     * @param null $key name of configuration you wnat to retrive
     * @return array|null
     *
     */

    public function getConfig($key = null) 
    {	
    	if($key!=null && isset($this->_config[$key])) { 
    		
    		return $this->_config[$key];
    	
    	} elseif($key == null) {
    		
            return $this->_config;
    	}

        return null;
    }

    /**
     * A settter. it get an array and update or add new configuration value to object
     * @param array $config configuration value
     * @throws Exception
     */

    public function setConfig($config = array()) 
    { 

    	if(is_array($config) ) {

    		if(!empty($config)) {
    			foreach($config as $key=>$value) {

    				$this->_config[$key] = $value;
    			}
    		}

     	} else {
    		
    		throw new Exception( "Invalid parameter");
    	}

    }

    /**
     *  reset config attribute
     * @return $this
     */
    public function resetConfig()
    {
        $this->_config = array();
        return $this;
    }

    /**
     * setting and logging error message
     * @param string $errorMsg error message you wan to log
     * @param array $trace stack trace
     * @param bool $error state of the error. true for important error
     * @return mixed
     * @throws Exception
     */

    public function exception($errorMsg,  array $trace, $error = true )
    {
        $classException = "CheckoutApi_Lib_ExceptionState";

        if (class_exists($classException)) {

            /** @var CheckoutApi_Lib_ExceptionState $class */
            $class = CheckoutApi_Lib_Factory::getSingletonInstance($classException);
              
        } else {
            
            throw new Exception("Not a valid class ::  CheckoutApi_Lib_ExceptionState");
            
        } 

        $class->setLog($errorMsg,$trace,$error);

        return $class;
        
    }

    /**
     * Reset the attribute config for an object
     * @throws Exception
     *
     */
    public function flushState()
    {
        $classException = "CheckoutApi_Lib_ExceptionState";

        if (class_exists($classException)) {
            /** @var CheckoutApi_Lib_ExceptionState $class */
            $class = CheckoutApi_Lib_Factory::getSingletonInstance($classException);
              
        } else {
            
            throw new Exception("Not a valid class ::  CheckoutApi_Lib_ExceptionState");
            
        } 
        $class->flushState();


    }

    /**
     * Return an a singleton instance of a CheckoutApi_Lib_ExceptionState object
     * @return CheckoutApi_Lib_ExceptionState|null
     * @throws Exception
     */
    public function getExceptionState()
    {
        $classException = "CheckoutApi_Lib_ExceptionState";
        $class = null;
        if (class_exists($classException)) {
            /** @var CheckoutApi_Lib_ExceptionState $class */
            $class = CheckoutApi_Lib_Factory::getSingletonInstance($classException);

        }

        return $class;
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->_config[] = $value;
        } else {
            $this->_config[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->_config[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->_config[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->_config[$offset]) ? $this->_config[$offset] : null;
    }
}