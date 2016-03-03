<?php 

/**
* This class is an adapter that allow to make call over http protocol via curl
 * @package     CheckoutApi
 * @category     Adapter
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
*/

class CheckoutApi_Client_Adapter_Curl extends CheckoutApi_Client_Adapter_Abstract implements CheckoutApi_Client_Adapter_Interface 
{
    /**  @var int $_timeout  timeout for gateway  */
    private $_timeout = 60;

    /**
     * CheckoutApi_ constructor for curl class
     * @param array $arguments configuration for setting the curl connection
     * @throws Exception
     */
	public function __construct( array $arguments = array())
	{

		if(!CheckoutApi_Utility_Utilities::checkExtension('curl')) {
			//throw new Exception("cURL extension has to be loaded to use CheckoutApi_Client_Adapter_Curl ");	
			$this->exception("cURL extension has to be loaded to use CheckoutApi_Client_Adapter_Curl", debug_backtrace());

		}

		parent::__construct($arguments);
	}
	


	/**
	* A method that do a request on provide uri and return itsel
	* @return CheckoutApi_Client_Adapter_Curl return self
	* Simple usage:
     *      $adapter->request()->getRespond()
     */

	public function request() 
	{
		
		if(!$this->getResource()) {
			
			$this->exception("No curl resource was found", debug_backtrace());
		}

		$resource = $this->getResource(); 
		curl_setopt($resource, CURLOPT_URL, $this->getUri());
		//setting curl options
		$headers = $this->getHeaders();

		if(!empty($headers)) {
			
			curl_setopt($resource, CURLOPT_HTTPHEADER, $headers);

			//curl_setopt($resource, CURLOPT_HEADER, true);	
		}

		$method = $this->getMethod();

		$curlMethod = '';
		switch ($method) {
			case CheckoutApi_Client_Adapter_Constant::API_POST:
				$curlMethod =  CheckoutApi_Client_Adapter_Constant::API_POST;
				break;
			case CheckoutApi_Client_Adapter_Constant::API_GET:
				$curlMethod =  CheckoutApi_Client_Adapter_Constant::API_GET;

				break;
			case CheckoutApi_Client_Adapter_Constant::API_DELETE:
			    $curlMethod = CheckoutApi_Client_Adapter_Constant::API_DELETE;
			break;
            case CheckoutApi_Client_Adapter_Constant::API_PUT:
                $curlMethod = CheckoutApi_Client_Adapter_Constant::API_PUT;
            break;
			default :
				
				$this->exception("Method currently not supported", debug_backtrace());
			break;
		}

        if($curlMethod != CheckoutApi_Client_Adapter_Constant::API_GET) {
            curl_setopt($resource, CURLOPT_CUSTOMREQUEST, $curlMethod);
        }

//		curl_setopt($resource , $curlMethod, true);

		if($method == CheckoutApi_Client_Adapter_Constant::API_POST || $method == CheckoutApi_Client_Adapter_Constant::API_PUT  ) {
			curl_setopt($resource, CURLOPT_POSTFIELDS, $this->getPostedParam());
		}

		curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($resource, CURLOPT_SSL_VERIFYPEER, false);


		$response = curl_exec($resource);
		$http_status = curl_getinfo($resource, CURLINFO_HTTP_CODE);

		if($http_status != 200 ) {
			$this->exception("An error has occurred while processing your transaction",
				array(
					'respond_code'=> $http_status,
					'curl_info' => curl_getinfo($resource),
					'respondBody'=>	$response,
					'postedParam' =>$this->getPostedParam(),
					'rawPostedParam' => $this->getRawpostedParam(),
					)
				);

		} elseif (curl_errno($resource)) {

			$info = curl_getinfo($resource);
			$this->exception("Curl issues ",$info);
		} 

 	    $this->setResource($resource);	
	    $this->setRespond($response);
		
		
		return $this;
	}

    public function getResourceInfo()
    {
         $info = curl_getinfo( $this->getResource());

        return array ('httpStatus'=>$info['http_code']);
    }
	/**
    * Close all open connections and release all set variables
    **/

	public function connect() 
	{
		if($this->getResource()) {
			$this->close();
		}

		$resource = curl_init();

		curl_setopt($resource,CURLOPT_CONNECTTIMEOUT,$this->getTimeout());
	
		$this->setResource($resource);
		parent::connect();
		return $this;
	}

	/**
    * Close all open connections and release all set variables
    **/

	public function close()
	{

		if($this->getResource()) {
			curl_close($this->_resource);
		}

		parent::close();
	}

    /**
     *  return a method type POST|GET|PUT|DELETE
     * @return  string default CheckoutApi_Client_Adapter_Constant::API_POST
     */
	public function getMethod()
	{
		$method = $this->getConfig('method');
		
		if(!$method) {
			$method = CheckoutApi_Client_Adapter_Constant::API_POST;
		}

		return $method;
	}

    /**
     * gateway timeout value
     * @return int timeout
     */
	public function getTimeout()
	{
		$timeout = $this->_timeout;
		if($this->getConfig('timeout')) {
			$timeout = $this->getConfig('timeout');
		}

		return $timeout;
	}




}