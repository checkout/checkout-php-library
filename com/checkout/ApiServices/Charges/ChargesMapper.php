<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 9:27 AM
 */

namespace com\checkout\ApiServices\Charges;


class ChargesMapper
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

			if(method_exists($requestModel,'getEmail') && $requestModel->getEmail()) {
				$requestPayload['email'] = $requestModel->getEmail();
			}
			
			if(method_exists($requestModel,'getCustomerName') && $requestModel->getCustomerName()) {
				$requestPayload['customerName'] = $requestModel->getCustomerName();
			}
			
			if(method_exists($requestModel,'getCustomerId') && $requestModel->getCustomerId()) {
				$requestPayload['customerId'] = $requestModel->getCustomerId();
			}

			if(method_exists($requestModel,'getValue') && $requestModel->getValue()) {
				$requestPayload['value'] = $requestModel->getValue();
			}

			if(method_exists($requestModel,'getCurrency') && $requestModel->getCurrency()) {
				$requestPayload['currency'] = $requestModel->getCurrency();
			}

			if(method_exists($requestModel,'getDescription') && $requestModel->getDescription()) {
				$requestPayload['description'] = $requestModel->getDescription();
			}
			
			if(method_exists($requestModel,'getChargeMode') && $requestModel->getChargeMode()) {
				$requestPayload['chargeMode'] = $requestModel->getChargeMode();
			}

			if(method_exists($requestModel,'getRiskCheck') && $requestModel->getRiskCheck()) {
				$requestPayload['riskCheck'] = $requestModel->getRiskCheck();
			}

			if(method_exists($requestModel,'getAttemptN3D') && $requestModel->getAttemptN3D()) {
				$requestPayload['attemptN3D'] = $requestModel->getAttemptN3D();
			}

			if(method_exists($requestModel,'getSuccessUrl') && $requestModel->getSuccessUrl()) {
				$requestPayload['successUrl'] = $requestModel->getSuccessUrl();
			}

			if(method_exists($requestModel,'getFailUrl') && $requestModel->getFailUrl()) {
				$requestPayload['failUrl'] = $requestModel->getFailUrl();
			}

			if(method_exists($requestModel,'getChargeId') && $requestModel->getChargeId()) {
				$requestPayload['chargeId'] = $requestModel->getChargeId();
			}

			if(method_exists($requestModel,'getMetadata') && $metadata = $requestModel->getMetadata()) {
				$requestPayload['metadata'] = $metadata;
			}

			if(method_exists($requestModel,'getCustomerIp') && $customerIp = $requestModel->getCustomerIp()) {
				$requestPayload['customerIp'] = $customerIp;
			}

			if(method_exists($requestModel,'getTrackId') && $trackId = $requestModel->getTrackId()) {
				$requestPayload['trackId'] = $trackId;
			}

			if(method_exists($requestModel,'getUdf1') && $udf1 = $requestModel->getUdf1()) {
				$requestPayload['udf1'] = $udf1;
			}

			if(method_exists($requestModel,'getUdf2') && $udf2 = $requestModel->getUdf2()) {
				$requestPayload['udf2'] = $udf2;
			}

			if(method_exists($requestModel,'getUdf3') && $udf3 = $requestModel->getUdf3()) {
				$requestPayload['udf3'] = $udf3;
			}

			if(method_exists($requestModel,'getUdf4') && $udf4 = $requestModel->getUdf4()) {
				$requestPayload['udf4'] = $udf4;
			}

			if(method_exists($requestModel,'getUdf5') && $udf5 = $requestModel->getUdf5()) {
				$requestPayload['udf5'] = $udf5;
			}

			if(method_exists($requestModel,'getDescriptor') && $descriptor = $requestModel->getDescriptor()) {
				$descriptorConfig = array (
					'name' => $descriptor->getName () ,
					'city' => $descriptor->getCity () ,
				);

				$requestPayload['descriptor'] = $descriptorConfig;
			}

			if(method_exists($requestModel,'getAutoCapTime') && $autoCapTime = $requestModel->getAutoCapTime()) {
				$requestPayload['autoCapTime'] = $autoCapTime;
			}

			if(method_exists($requestModel,'getAutoCapture') && $autoCapture = $requestModel->getAutoCapture()) {
				$requestPayload['autoCapture'] = $autoCapture;
			}


      if(method_exists($requestModel,'getTransactionIndicator') && $transactionIndicator = $requestModel->getTransactionIndicator()) {
          $requestPayload['transactionIndicator'] = $transactionIndicator;
      }

      if(method_exists($requestModel,'getCardOnFile') && $cardOnFile = $requestModel->getCardOnFile()) {
          $requestPayload['cardOnFile'] = $cardOnFile;
      }

      if(method_exists($requestModel,'getPreviousChargeId') && $previousChargeId = $requestModel->getPreviousChargeId()) {
          $requestPayload['previousChargeId'] = $previousChargeId;
      }

			if( method_exists($requestModel,'getShippingDetails') && $shippingAddress = $requestModel->getShippingDetails()) {
				$shippingAddressConfig = array (
					'addressLine1' => $shippingAddress->getAddressLine1 () ,
					'addressLine2' => $shippingAddress->getAddressLine2 () ,
					'postcode' => $shippingAddress->getPostcode () ,
					'country' => $shippingAddress->getCountry () ,
					'city' => $shippingAddress->getCity () ,
					'state' => $shippingAddress->getState () ,

				);
				
				if ($shippingAddress->getPhone() != null) {
					$shippingAddressConfig = array_merge_recursive($shippingAddressConfig, array(
					   'phone' => $shippingAddress->getPhone()->getPhoneDetails()
						)
					);
				}

				$requestPayload['shippingDetails'] = $shippingAddressConfig;
			}

			
			if (method_exists($requestModel, 'getBillingDetails') && $billingAddress = $requestModel->getBillingDetails()) {
				$billingAddressConfig = array(
					'addressLine1' => $billingAddress->getAddressLine1(),
					'addressLine2' => $billingAddress->getAddressLine2(),
					'postcode' => $billingAddress->getPostcode(),
					'country' => $billingAddress->getCountry(),
					'city' => $billingAddress->getCity(),
					'state' => $billingAddress->getState(),
				);

				if ($billingAddress->getPhone() != null) {
					$billingAddressConfig = array_merge_recursive($billingAddressConfig, array(
						'phone' => $billingAddress->getPhone()->getPhoneDetails()
							)
					);
				}

				$requestPayload['billingDetails'] = $billingAddressConfig;
			}

			if(method_exists($requestModel,'getProducts') && $productsItem =  $requestModel->getProducts()) {
				
				foreach ( $productsItem as $i => $item ) {

					if( $item->getName ()) {
						$products[ $i ][ 'name' ] = $item->getName ();
					}
					if( $item->getProductId ()) {
						$products[ $i ][ 'productId' ] = $item->getProductId ();
					}
					if( $item->getSku ()) {
						$products[ $i ][ 'sku' ] = $item->getSku ();
					}
					if( $item->getPrice ()) {
						$products[ $i ][ 'price' ] = $item->getPrice ();
					}
					if( $item->getQuantity ()) {
						$products[ $i ][ 'quantity' ] = $item->getQuantity ();
					}
					if( $item->getDescription ()) {
						$products[ $i ][ 'description' ] = $item->getDescription ();
					}
					if( $item->getImage ()) {
						$products[ $i ][ 'image' ] = $item->getImage ();
					}
					if( $item->getShippingCost ()) {
						$products[ $i ][ 'shippingCost' ] = $item->getShippingCost ();
					}
					if( $item->getTrackingUrl ()) {
						$products[ $i ][ 'trackingUrl' ] = $item->getTrackingUrl ();
					}

				
				}

				$requestPayload['products'] = $products;
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

			if(method_exists($requestModel,'getCardId') && $cardId = $requestModel->getCardId()) {
				$requestPayload[ 'cardId' ] = $cardId;
			}
			
			if(method_exists($requestModel,'getCvv') && $cvv = $requestModel->getCvv()) {
				$requestPayload[ 'cvv' ] = $cvv;
			}

			if(method_exists($requestModel,'getCardToken') && $cardToken = $requestModel->getCardToken()) {
				$requestPayload[ 'cardToken' ] = $cardToken;
			}

			if(method_exists($requestModel,'getPaymentToken') && $paymentToken = $requestModel->getPaymentToken()) {
				$requestPayload[ 'paymentToken' ] = $paymentToken;
			}

			if(method_exists($requestModel,'getPaymentPlans') ) {
				$paymentPlans = $requestModel->getPaymentPlans();

				foreach($paymentPlans as $singlePlan) {

					$requestSinglePaymentPlan = array();

					if (method_exists($singlePlan, 'getName') && ($name = $singlePlan->getName())) {
						$requestSinglePaymentPlan['name'] = $name;
					}

					if (method_exists($singlePlan, 'getPlanTrackId') && ($planTrackId = $singlePlan->getPlanTrackId())) {
						$requestSinglePaymentPlan['planTrackId'] = $planTrackId;
					}

					if (method_exists($singlePlan, 'getAutoCapTime') && ($autoCapTime = $singlePlan->getAutoCapTime())) {
						$requestSinglePaymentPlan['autoCapTime'] = $autoCapTime;
					}

					if (method_exists($singlePlan, 'getCurrency') && ($currency = $singlePlan->getCurrency())) {
						$requestSinglePaymentPlan['currency'] = $currency;
					}

					if (method_exists($singlePlan, 'getValue') && ($value = $singlePlan->getValue())) {
						$requestSinglePaymentPlan['value'] = $value;
					}
					if (method_exists($singlePlan, 'getCycle') && ($cycle = $singlePlan->getCycle())) {
						$requestSinglePaymentPlan['cycle'] = $cycle;
					}

					if (method_exists($singlePlan, 'getRecurringCount') && ($recurringCount = $singlePlan->getRecurringCount())) {
						$requestSinglePaymentPlan['recurringCount'] = $recurringCount;
					}

					if (method_exists($singlePlan, 'getPlanId') && ($planId = $singlePlan->getPlanId())) {
						$requestSinglePaymentPlan['planId'] = $planId;
					}

					if (method_exists($singlePlan, 'getStartDate') && ($startDate = $singlePlan->getStartDate())) {
						$requestSinglePaymentPlan['startDate'] = $startDate;
					}

					$requestPayload['paymentPlans'][] = $requestSinglePaymentPlan;
				}
			}

		}

		return $requestPayload;

	}
}