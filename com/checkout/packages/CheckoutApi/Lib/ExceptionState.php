<?php

/**
 *  CheckoutApi_Lib_ExceptionState
 *  A class that manage and log error for a request
 * @todo need to clean up a bit the code and renaming few thing in it
 * @package     CheckoutApi
 * @category     Api
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 */
 class CheckoutApi_Lib_ExceptionState extends CheckoutApi_Lib_Object
{
     /** @var bool $_errorState keep the state of error. if yes mean there is an error that prevent futher processing */
	private $_errorState = false;
     /** @var array $_trace an array that hold a debugging stack trace */
	private $_trace = array();
     /** @var array $message an array that hold all error message for a request */
	private $_message = array();
     /** @var array $_critical an array that hold the critical state of each error log for a request */
	private $_critical = array();
     /** @var bool $_debug a flag to set debug mode on */
	private $_debug = false;

     /**
      * Constructor class, it set if we need to debug or not
      */
	public function __construct()
	{
        if(isset($_SERVER['API_CHECKOUT_DEBUG'])) {
          $this->_debug = $_SERVER['API_CHECKOUT_DEBUG'] == "true" ? true : false;
        }
        $this->_debug  = true;
	}

     /**
      * Set error state  true for high
      * @param boolean $state state of the current error
      *
      */
	public function setErrorState($state)
	{
		$this->_errorState = $state;
		
	}

     /**
      *  Return the current error state of the object
      * @return bool
      *
      */

	private function getErrorState()
	{
		return $this->_errorState;
	}

     /**
      * A method that check if object state is error
      * @return bool
      *
      */
	public function hasError()
	{
		return $this->getErrorState();
	}

     /**
      *  check if respond state  is valid
      * @return boolean
      */
	public function isValid()
	{
		return !$this->getErrorState();
	}

     /**
      * @set debug stack trace array
      * @param $trace array
      */
	public function setTrace($trace)
	{
		$this->_trace[] = $trace;
	}

     /**
      * CheckoutApi_ getter for $_trace
      * @return array
      */
	public function getTrace()
	{
		return $this->_trace;
	}

     /**
      * CheckoutApi_ return array of message
      * @param $message
      */
	public function setMessage($message)
	{

		 $this->_message[md5($message)] = $message;
		
	}

     /**
      * CheckoutApi_ return an arrray of errors
      * @return array
      */
	public function getMessage()
	{
		return $this->_message;
	}

   /**
      *  compile all errors in one line
      * @return string
      */
     public function getErrorMessage()
     {
         $messages = $this->getMessage();
         $critical = $this->getCritical();
         $msgError = "";
         $i = 0;
         foreach ($messages as $message ) {

             if ($critical[$i++]) {
                 $msgError .= "{$message}\n";
             }
         }

         return $msgError;
     }

     /**
      *  set level of individual error
      * @param $critical
      * @return mixed
      */
	public function setCritical($critical)
	{
	     $this->_critical[] = $critical;
	}

     /**
      *  Getter
      * @return array
      */
	public function getCritical()
	{
		return $this->_critical;
	}

	/**
	 * set error state of object. we can have an error but still proceed 
	 * 
	 * @var string $errorMsg error message
	 * @var array $trace statck trace
	 * @var boolean $state if critical or not
	 * 
	 * 
	 **/

	public function setLog($errorMsg,$trace, $state = true)
	{

		$this->setErrorState($state);
		$this->setTrace($trace);
		$this->setMessage($errorMsg);
		$this->setCritical($state);
	}

     /**
      * CheckoutApi_ print out the error
      * @return string $errorToreturn a list of errors
      */

	public function debug()
	{
	    $errorToreturn = '';
		if($this->_debug && $this->hasError() ){
			$message = $this->getMessage();
			$trace = $this->getTrace();
			$critical = $this->getCritical();

			for($i= 0, $count = sizeOf($message); $i<$count;$i++ ) {

				if($critical[$i]){
                    echo '<strong style="color:red">';
				} else  {
					continue;
				}

				CheckoutApi_Utility_Utilities::dump($message[$i] .'==> { ');
				
				foreach($trace[$i] as $errorIndex => $errors) {
                    echo   "<pre>";
                    echo    $errorIndex ."=>  "; print_r($errors);

                    echo   "</pre>";
				}
				
				if($critical[$i])	{
                    echo   '</strong>';
				}
				
				CheckoutApi_Utility_Utilities::dump('} ');
				
			}
			
		}
		return $errorToreturn;
	}

     /**
      * reset all attribute for the exception error object
      */
	public function flushState()
	{
		$this_errorState = false;
		$this_trace = array();
		$this_message = array();
		$this_critical = array();
	}


}