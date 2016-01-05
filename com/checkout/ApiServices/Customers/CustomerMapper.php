<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 8:45 AM
 */

namespace com\checkout\ApiServices\Customers;


class CustomerMapper
{
	private $_requestModel;

	public  function __construct( $requestModel)
	{
		$this->setRequestModel($requestModel);
	}

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

			if(method_exists($requestModel,'getName') && ($name = $requestModel->getName())) {
				$requestPayload['name'] = $name;
			}

			if(method_exists($requestModel,'getEmail') && ($email = $requestModel->getEmail())) {
				$requestPayload['email'] = $email;
			}
            
            if(method_exists($requestModel,'getCustomerName') && ($customerName = $requestModel->getCustomerName())) {
				$requestPayload['customerName'] = $customerName;
			}
            
			if(method_exists($requestModel,'getMetadata') && ($metadata = $requestModel->getMetadata())) {
				$requestPayload['metadata'] = $metadata;
			}

			if(method_exists($requestModel,'getPhoneNumber') && ($phoneNumber = $requestModel->getPhoneNumber())) {
				$requestPayload['phoneNumber'] = $phoneNumber;
			}
			if(method_exists($requestModel,'getCustomerId') && ($customerId = $requestModel->getCustomerId())) {
				$requestPayload['customerId'] = $customerId;
			}

			if(method_exists($requestModel,'getDescription') && ($description = $requestModel->getDescription())) {
				$requestPayload['description'] = $description;
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
					);
                                        
                    if($billingAddress->getPhone () != null){
                      $billingAddressConfig = array_merge_recursive ( $billingAddressConfig , 
                          array (
                            'phone' => $billingAddress->getPhone()->getPhoneDetails() 
                          )
                      );
                    }  
					$requestPayload[ 'card' ][ 'billingDetails' ] = $billingAddressConfig;
				}


				if ( $name = $cardBase->getName () ) {
					$requestPayload[ 'card' ][ 'name' ] = $name;
				}

				if ( $number = $cardBase->getNumber () ) {
					$requestPayload[ 'card' ][ 'number' ] = $number;
				}

				if ( $expiryMonth = $cardBase->getExpiryMonth () ) {
					$requestPayload[ 'card' ][ 'expiryMonth' ] = $expiryMonth;
				}

				if ( $expiryYear = $cardBase->getExpiryYear () ) {
					$requestPayload[ 'card' ][ 'expiryYear' ] = $expiryYear;
				}

				if ( $cvv = $cardBase->getCvv () ) {
					$requestPayload[ 'card' ][ 'cvv' ] = $cvv;
				}
			}


		}

		return $requestPayload;

	}
}
