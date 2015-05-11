<?php
namespace com\checkout\helpers;

final class ApiHttpClient
{
	/**
	 * @param String $requestUri
	 * @param String $authenticationKey
	 * @param string|null $requestPayload
	 */
	public function postRequest( $requestUri,  $authenticationKey, $requestPayload = null)
	{
		$requestPayload['method'] = 'POST';
		return  \CheckoutApi_Api::getApi()->request($requestUri,$requestPayload, true);
	}

	/**
	 * @param String $requestUri
	 * @param String $authenticationKey
	 * @param string|null $requestPayload
	 */
	public function getRequest( $requestUri,  $authenticationKey, $requestPayload = null)
	{
		$requestPayload['method'] = 'GET';
		return  \CheckoutApi_Api::getApi()->request($requestUri,$requestPayload, true);
	}

	/**
	 * @param String $requestUri
	 * @param String $authenticationKey
	 * @param string|null $requestPayload
	 */
	public function putRequest( $requestUri,  $authenticationKey, $requestPayload = null)
	{
		$requestPayload['method'] = 'PUT';
		return  \CheckoutApi_Api::getApi()->request($requestUri,$requestPayload, true);
	}


	/**
	 * @param String $requestUri
	 * @param String $authenticationKey
	 * @param string|null $requestPayload
	 */
	public function deleteRequest( $requestUri,  $authenticationKey, $requestPayload = null)
	{
		$requestPayload['method'] = 'DELETE';
		return  \CheckoutApi_Api::getApi()->request($requestUri,$requestPayload, true);
	}
}
