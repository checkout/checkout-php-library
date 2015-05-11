<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 7:40 AM
 */

namespace com\checkout\ApiServices\Customers;


class CustomerService extends \com\checkout\ApiServices\BaseServices
{

	public function createCustomer(RequestModels\CustomerCreate $requestModel)
	{

		$customrMapper = new CustomerMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $customrMapper->requestPayloadConverter(),

		);

		$processCharge = \com\checkout\ApiHttpClient::postRequest($this->_apiUrl->getCustomersApiUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new ResponseModels\Customer($processCharge);

		return $responseModel;
	}

	public function updateCustomer(RequestModels\CustomerUpdate $requestModel)
	{

		$customrMapper = new CustomerMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $customrMapper->requestPayloadConverter(),

		);
		$updateCustomerUri = $this->_apiUrl->getCustomersApiUri().'/'.$requestModel->getCustomerId();
		$processCharge = \com\checkout\ApiHttpClient::putRequest($updateCustomerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new ResponseModels\Customer($processCharge);

		return $responseModel;

	}

	public function deleteCustomer($customerId)
	{

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
		$deleteCustomerUri = $this->_apiUrl->getCustomersApiUri().'/'.$customerId;
		$processCharge = \com\checkout\ApiHttpClient::deleteRequest($deleteCustomerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \com\checkout\ApiServices\SharedModels\DeleteResponse($processCharge);

		return $responseModel;
	}

	public function getCustomer($customerId)
	{

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
		$getCustomerUri = $this->_apiUrl->getCustomersApiUri().'/'.$customerId;
		$processCharge = \com\checkout\ApiHttpClient::getRequest($getCustomerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new ResponseModels\Customer($processCharge);

		return $responseModel;
	}

	public function  getCustomerList($count = null , $offset =null , $startDate = null, $endDate = null, $singleDay =
	false)
	{
		$customerUri = $this->_apiUrl->getCustomersApiUri();
		$delimiter = '?';
		$createdAt = 'created=';

		$startDateUnix = ($startDate)?time($startDate):null;
		$endDateUnix = ($endDate)?time($endDate):null;

		if($count){
			$customerUri = "{$customerUri}{$delimiter}count={$count}";
			$delimiter = '&';
		}

		if($offset){
			$customerUri =  "{$customerUri}{$delimiter}offset={$offset}";
			$delimiter = '&';
		}

		if($singleDay && $startDateUnix) {
			$customerUri="{$customerUri}{$delimiter}{$createdAt}{$startDateUnix}|";


		} else {
			if ($startDateUnix) {

				$customerUri = "{$customerUri}{$delimiter}{$createdAt}{$startDateUnix}";
				$createdAt = '|';
			}

			if ($endDateUnix) {
				$customerUri = "{$customerUri}{$createdAt}{$endDateUnix}";

			}
		}

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);

		$processCharge = \com\checkout\ApiHttpClient::getRequest($customerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new ResponseModels\CustomerList($processCharge);

		return $responseModel;

	}

}