<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 7:40 AM
 */

namespace PHPPlugin\ApiServices\Customers;


class CustomerService extends \PHPPlugin\ApiServices\BaseServices
{

	public function createCustomer(\PHPPlugin\ApiServices\Customers\RequestModels\CustomerCreate $requestModel)
	{

		$customrMapper = new \PHPPlugin\ApiServices\Customers\CustomerMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $customrMapper->requestPayloadConverter(),

		);

		$processCharge = \PHPPlugin\ApiHttpClient::postRequest($this->_apiUrl->getCustomersApiUri(),
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Customers\ResponseModels\Customer($processCharge);

		return $responseModel;
	}

	public function updateCustomer(\PHPPlugin\ApiServices\Customers\RequestModels\CustomerUpdate $requestModel)
	{

		$customrMapper = new \PHPPlugin\ApiServices\Customers\CustomerMapper($requestModel);

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),
			'postedParam'   => $customrMapper->requestPayloadConverter(),

		);
		$updateCustomerUri = $this->_apiUrl->getCustomersApiUri().'/'.$requestModel->getCustomerId();
		$processCharge = \PHPPlugin\ApiHttpClient::putRequest($updateCustomerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Customers\ResponseModels\Customer($processCharge);

		return $responseModel;

	}

	public function deleteCustomer($customerId)
	{

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
		$deleteCustomerUri = $this->_apiUrl->getCustomersApiUri().'/'.$customerId;
		$processCharge = \PHPPlugin\ApiHttpClient::deleteRequest($deleteCustomerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\SharedModels\DeleteResponse($processCharge);

		return $responseModel;
	}

	public function getCustomer($customerId)
	{

		$requestPayload = array (
			'authorization' => $this->_apiSetting->getPrivateKey(),
			'mode'          => $this->_apiSetting->getMode(),

		);
		$getCustomerUri = $this->_apiUrl->getCustomersApiUri().'/'.$customerId;
		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($getCustomerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Customers\ResponseModels\Customer($processCharge);

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

		$processCharge = \PHPPlugin\ApiHttpClient::getRequest($customerUri,
			$this->_apiSetting->getPrivateKey(),$requestPayload);

		$responseModel = new \PHPPlugin\ApiServices\Customers\ResponseModels\CustomerList($processCharge);

		return $responseModel;

	}

}