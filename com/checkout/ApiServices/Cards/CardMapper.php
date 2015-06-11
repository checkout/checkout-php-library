<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/18/2015
 * Time: 10:11 AM
 */

namespace com\checkout\ApiServices\Cards;


class CardMapper
{
	private $_requestModel;

	public  function __construct( $requestModel)
	{
		$this->setRequestModel($requestModel);
	}
	/**
	 * @return mixed
	 */
	public function getRequestModel ()
	{
		return $this->_requestModel;
	}

	/**
	 * @param mixed $requestModel
	 */
	public function setRequestModel ( $requestModel )
	{
		$this->_requestModel = $requestModel;
	}



	public function requestPayloadConverter($requestModel = null )
	{
		$requestPayload = null;
		if(!$requestModel) {
			$requestModel = $this->getRequestModel();
		}
		if($requestModel) {
			$requestPayload = array ();

			if(method_exists($requestModel,'getCustomerId') && ($customerId = $requestModel->getCustomerId())) {
				$requestPayload['customerId'] = $customerId;
			}

			if(method_exists($requestModel,'getBaseCardCreate') ) {
				$cardBase = $requestModel->getBaseCardCreate ();
				if ( $billingAddress = $cardBase->getBillingDetails () ) {
					$billingAddressConfig = array (
						'addressLine1' => $billingAddress->getAddressLine1 () ,
						'addressLine2' => $billingAddress->getAddressLine2 () ,
						'postcode'     => $billingAddress->getPostcode () ,
						'country'      => $billingAddress->getCountry () ,
						'city'         => $billingAddress->getCity () ,
						'state'        => $billingAddress->getState () ,
						'phone'        => $billingAddress->getPhone ()
					);
					$requestPayload[ 'card' ][ 'billingDetails' ] = $billingAddressConfig;
				}


				if (method_exists($requestModel,'getName') &&  $name = $cardBase->getName () ) {
					$requestPayload[ 'name' ] = $name;
				}

				if ( method_exists($requestModel,'getNumber') && $number = $cardBase->getNumber () ) {
					$requestPayload[ 'number' ] = $number;
				}

				if (  method_exists($requestModel,'getExpiryMonth') && $expiryMonth = $cardBase->getExpiryMonth () ) {
					$requestPayload[ 'expiryMonth' ] = $expiryMonth;
				}

				if ( method_exists($requestModel,'getExpiryYear') && $expiryYear = $cardBase->getExpiryYear () ) {
					$requestPayload[ 'expiryYear' ] = $expiryYear;
				}

				if (  method_exists($requestModel,'getCvv') && $cvv = $cardBase->getCvv () ) {
					$requestPayload[ 'cvv' ] = $cvv;
				}
			}


		}

		return $requestPayload;

	}

	public function requestPayloadConverterCard($requestModel = null )
	{
		$requestPayload = null;
		if(!$requestModel) {
			$requestModel = $this->getRequestModel();
		}
		if($requestModel) {
			$requestPayload = array ();

			if(method_exists($requestModel,'getBaseCard') ) {
				$cardBase = $requestModel->getBaseCard();

				if ( $name = $cardBase->getName () ) {
					$requestPayload[ 'card' ][ 'name' ] = $name;
				}

				if ( method_exists($requestModel,'getNumber') && $number = $cardBase->getNumber () ) {
					$requestPayload[ 'card' ][ 'number' ] = $number;
				}

				if (  method_exists($requestModel,'getExpiryMonth') && $expiryMonth = $cardBase->getExpiryMonth () ) {
					$requestPayload[ 'card' ][ 'expiryMonth' ] = $expiryMonth;
				}

				if ( method_exists($requestModel,'getExpiryYear') && $expiryYear = $cardBase->getExpiryYear () ) {
					$requestPayload[ 'card' ][ 'expiryYear' ] = $expiryYear;
				}

				if ( method_exists($requestModel,'getCvv') && $cvv = $cardBase->getCvv () ) {
					$requestPayload[ 'card' ][ 'cvv' ] = $cvv;
				}
			}


		}

		return $requestPayload;

	}

}