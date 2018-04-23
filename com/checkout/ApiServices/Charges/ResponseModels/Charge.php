<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/16/2015
 * Time: 3:41 PM
 */

namespace com\checkout\ApiServices\Charges\ResponseModels;


class Charge extends \com\checkout\ApiServices\Charges\RequestModels\BaseCharge
{
	protected $_object;
	protected $_id;
	protected $_liveMode;
	protected $_created;
	protected $_value;
	protected $_currency;
	protected $_email;
    protected $_chargeMode;
    protected $_customerIp;
	protected $_description;
	protected $_responseMessage;
	protected $_responseAdvancedInfo;
	protected $_responseCode;
	protected $_refundedValue;
	protected $_balanceTransaction;
	protected $_status;
	protected $_authCode;
	protected $_autoCapture;
	protected $_autoCapTime;
	protected $_paid;
	protected $_refunded;
	protected $_deferred;
	protected $_expired;
	protected $_captured;
	protected $_isCascaded;
	protected $_card;
	protected $_shippingDetails;
	protected $_products;
	protected $_refunds;
	protected $_localPayment;
	protected $_descriptor;
	protected $_metadata;
    protected $_transactionIndicator;
	protected $_cardOnFile;
	protected $_previousChargeId;
    protected $_originalId;
	protected $_redirectUrl;
	protected $_paymentToken;
	protected $_response = null;
	protected $_customerPaymentPlans;
    protected $_responseType;


	public function __construct($response)
	{
        parent::__construct($response);
		$this->setResponse($response);
		$this->_setObject ( $response->getObject());
		$this->_setId ( $response->getId());
		$this->_setLiveMode ( $response->getLiveMode());
		$this->_setCreated ( $response->getCreated());
		$this->_setValue ( $response->getValue());
		$this->_setCurrency ( $response->getCurrency());
        $this->_setChargeMode ( $response->getChargeMode());
		$this->_setEmail ( $response->getEmail());
        $this->_setCustomerIp ( $response->getCustomerIp());
		$this->_setDescription ( $response->getDescription());
		$this->_setResponseMessage ( $response->getResponseMessage());
		$this->_setResponseAdvancedInfo ( $response->getResponseAdvancedInfo());
		$this->_setResponseCode ( $response->getResponseCode());
		$this->_setRefundedValue ( $response->getRefundedValue());
		$this->_setBalanceTransaction ( $response->getBalanceTransaction());
		$this->_setStatus ( $response->getStatus());
		$this->_setAuthCode ( $response->getAuthCode());
		$this->_setAutoCapture ( $response->getAutoCapture());
		$this->_setAutoCapTime ( $response->getAutoCapTime());
		$this->_setPaid ( $response->getPaid());
		$this->_setRefunded ( $response->getRefunded());
		$this->_setDeferred ( $response->getDeferred());
		$this->_setExpired ( $response->getExpired());
		$this->_setCaptured ( $response->getCaptured());
		$this->_setIsCascaded ( $response->getIsCascaded());
		$this->setDescription ( $response->getDescription());
		$this->setTrackId ( $response->getTrackId());
		$this->setUdf1 ( $response->getUdf1());
		$this->setUdf2 ( $response->getUdf2());
		$this->setUdf3 ( $response->getUdf3());
		$this->setUdf4 ( $response->getUdf4());
		$this->setUdf5 ( $response->getUdf5());

		if($response->getDescriptor()) {
			$this->_setDescriptor ( $response->getDescriptor () );
		}

		if($response->getMetadata()) {
			$this->setMetadata ( $response->getMetadata ()->toArray () );
		}

		if($response->getCard()) {
			$this->_setCard ( $response->getCard () );
		}
		if($response->getShippingDetails()){
			$this->_setShippingDetails ( $response->getShippingDetails());
		}

		if($response->getProducts()) {
			$this->_setProducts ( $response->getProducts () );
		}
		if($response->getRefunds()) {
			$this->_setRefunds ( $response->getRefunds () );
		}

		$this->_setLocalPayment ( $response->getLocalPayment());

		if($response->getMetadata()) {
			$this->_setMetadata ( $response->getMetadata () );
		}

        if($response->getTransactionIndicator()) {
            $this->_setTransactionIndicator ( $response->getTransactionIndicator () );
        }
                
        if($response->getCardOnFile()) {
            $this->_setCardOnFile ( $response->getCardOnFile () );
        }

        if($response->getPrevioudChargeId()) {
            $this->_setPrevioudChargeId ( $response->getPrevioudChargeId () );
        }

        if($response->getOriginalId()) {
            $this->_originalId = $response->getOriginalId ();
        }

        if($response->getCustomerPaymentPlans()) {
			$this->_setCustomerPaymentPlans ( $response->getCustomerPaymentPlans () );
		}

        if($response->getRedirectUrl()) {
            $this->_setRedirectUrl( $response->getRedirectUrl () );
            $this->_setPaymentToken ( $response->getId () );
        }

        $this->_setResponseType( $response->getChargeMode (), $response->getRedirectUrl () );

		$this->json = $response->getRawOutput();

		$this->_setResponse ( $response->getResponse());
	}

	public function setResponse($response)
	{
		$this->_response = $response;
	}

	public function getResponse()
	{
		return $this->_response;
	}

    /**
     * @return mixed
     */
    public function getOriginalId()
    {
        return $this->_originalId;
    }

    /**
     * @param mixed $setOriginalId
     */
    public function setOriginalId($setOriginalId)
    {
        $this->_setOriginalId = $setOriginalId;
    }
	/**
	 * @return mixed
	 */
	public function getObject ()
	{
		return $this->_object;
	}

	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @return mixed
	 */
	public function getLiveMode ()
	{
		return $this->_liveMode;
	}

	/**
	 * @return mixed
	 */
	public function getCreated ()
	{
		return $this->_created;
	}

	/**
	 * @return mixed
	 */
	public function getValue ()
	{
		return $this->_value;
	}

	/**
	 * @return mixed
	 */
	public function getCurrency ()
	{
		return $this->_currency;
	}

	/**
	 * @return mixed
	 */
	public function getEmail ()
	{
		return $this->_email;
	}

    /**
	 * @return mixed
	 */
	public function getCustomerIp()
	{
		return $this->_customerIp;
	}

    /**
	 * @return mixed
	 */
	public function getChargeMode ()
	{
		return $this->_chargeMode;
	}

	/**
	 * @return mixed
	 */
	public function getDescription ()
	{
		return $this->_description;
	}

	/**
	 * @return mixed
	 */
	public function getResponseMessage ()
	{
		return $this->_responseMessage;
	}

	/**
	 * @return mixed
	 */
	public function getResponseAdvancedInfo ()
	{
		return $this->_responseAdvancedInfo;
	}

	/**
	 * @return mixed
	 */
	public function getResponseCode ()
	{
		return $this->_responseCode;
	}

	/**
	 * @return mixed
	 */
	public function getRefundedValue ()
	{
		return $this->_refundedValue;
	}

	/**
	 * @return mixed
	 */
	public function getBalanceTransaction ()
	{
		return $this->_balanceTransaction;
	}

	/**
	 * @return mixed
	 */
	public function getStatus ()
	{
		return $this->_status;
	}

	/**
	 * @return mixed
	 */
	public function getAuthCode ()
	{
		return $this->_authCode;
	}

	/**
	 * @return mixed
	 */
	public function getAutoCapture ()
	{
		return $this->_autoCapture;
	}

	/**
	 * @return mixed
	 */
	public function getAutoCapTime ()
	{
		return $this->_autoCapTime;
	}

	/**
	 * @return mixed
	 */
	public function getPaid ()
	{
		return $this->_paid;
	}

	/**
	 * @return mixed
	 */
	public function getRefunded ()
	{
		return $this->_refunded;
	}

	/**
	 * @return mixed
	 */
	public function getDeferred ()
	{
		return $this->_deferred;
	}

	/**
	 * @return mixed
	 */
	public function getExpired ()
	{
		return $this->_expired;
	}

	/**
	 * @return mixed
	 */
	public function getCaptured ()
	{
		return $this->_captured;
	}

	/**
	 * @return mixed
	 */
	public function getIsCascaded ()
	{
		return $this->_isCascaded;
	}

	/**
	 * @return mixed
	 */
	public function getCard ()
	{
		return $this->_card;
	}

	/**
	 * @return mixed
	 */
	public function getShippingDetails ()
	{
		return $this->_shippingDetails;
	}

	/**
	 * @return mixed
	 */
	public function getProducts ()
	{
		return $this->_products;
	}

	/**
	 * @return mixed
	 */
	public function getRefunds ()
	{
		return $this->_refunds;
	}

	/**
	 * @return mixed
	 */
	public function getLocalPayment ()
	{
		return $this->_localPayment;
	}

    /**
     * @return mixed
     */
    public function getTransactionIndicator()
    {
        return $this->_transactionIndicator;
    }
    
    public function getCardOnFile() {
        return $this->_cardOnFile;
    }

    public function getPreviousChargeId() {
        return $this->_previousChargeId;
    }

    public function setCardOnFile($cardOnFile) {
        $this->_cardOnFile = $cardOnFile;
    }

    public function setPreviousChargeId($previousChargeId) {
        $this->_previousChargeId = $previousChargeId;
    }

    

    /**
	 * @return mixed
	 */
	public function getDescriptor ()
	{
		return $this->_descriptor;
	}


	/**
	 * @return mixed
	 */
	public function getMetadata ()
	{
		return $this->_metadata;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerPaymentPlans ()
	{
		return $this->_customerPaymentPlans;
	}

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->_redirectUrl;
    }

    /**
     * @return mixed
     */
    public function getPaymentToken()
    {
        return $this->_paymentToken;
    }

    /**
     * @param mixed $object
     */
    public function getResponseType()
    {
        return $this->_responseType;
    }

	/**
	 * @param mixed $object
	 */
	protected function _setObject ( $object )
	{
		$this->_object = $object;
	}

	/**
	 * @param mixed $id
	 */

	protected function _setId ( $id )
	{
		$this->_id = $id;
	}

	/**
	 * @param mixed $liveMode
	 */
	protected function _setLiveMode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}

	/**
	 * @param mixed $created
	 */
	protected function _setCreated ( $created )
	{
		$this->_created = $created;
	}

	/**
	 * @param mixed $value
	 */
	protected function _setValue ( $value )
	{
		$this->_value = $value;
	}

	/**
	 * @param mixed $currency
	 */
	protected function _setCurrency ( $currency )
	{
		$this->_currency = $currency;
	}

	/**
	 * @param mixed $email
	 */
	protected function _setEmail ( $email )
	{
		$this->_email = $email;
	}

    /**
	 * @param mixed $customerIp
	 */
	protected function _setCustomerIp ( $customerIp )
	{
		$this->_customerIp = $customerIp;
	}

    /**
	 * @param mixed $chargeMode
	 */
	protected function _setChargeMode ( $chargeMode )
	{
		$this->_chargeMode = $chargeMode;
	}
	/**
	 * @param mixed $description
	 */
	protected function _setDescription ( $description )
	{
		$this->_description = $description;
	}

	/**
	 * @param mixed $responseMessage
	 */
	protected function _setResponseMessage ( $responseMessage )
	{
		$this->_responseMessage = $responseMessage;
	}

	/**
	 * @param mixed $responseAdvancedInfo
	 */
	protected function _setResponseAdvancedInfo ( $responseAdvancedInfo )
	{
		$this->_responseAdvancedInfo = $responseAdvancedInfo;
	}

	/**
	 * @param mixed $responseCode
	 */
	protected function _setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

	/**
	 * @param mixed $refundedValue
	 */
	protected function _setRefundedValue ( $refundedValue )
	{
		$this->_refundedValue = $refundedValue;
	}

	/**
	 * @param mixed $balanceTransaction
	 */
	protected function _setBalanceTransaction ( $balanceTransaction )
	{
		$this->_balanceTransaction = $balanceTransaction;
	}

	/**
	 * @param mixed $status
	 */
	protected function _setStatus ( $status )
	{
		$this->_status = $status;
	}

	/**
	 * @param mixed $authCode
	 */
	protected function _setAuthCode ( $authCode )
	{
		$this->_authCode = $authCode;
	}

	/**
	 * @param mixed $autoCapture
	 */
	protected function _setAutoCapture ( $autoCapture )
	{
		$this->_autoCapture = $autoCapture;
	}

	/**
	 * @param mixed $autoCapTime
	 */
	protected function _setAutoCapTime ( $autoCapTime )
	{
		$this->_autoCapTime = $autoCapTime;
	}

	/**
	 * @param mixed $paid
	 */
	protected function _setPaid ( $paid )
	{
		$this->_paid = $paid;
	}

	/**
	 * @param mixed $refunded
	 */
	protected function _setRefunded ( $refunded )
	{
		$this->_refunded = $refunded;
	}

	/**
	 * @param mixed $deferred
	 */
	protected function _setDeferred ( $deferred )
	{
		$this->_deferred = $deferred;
	}

	/**
	 * @param mixed $expired
	 */
	protected function _setExpired ( $expired )
	{
		$this->_expired = $expired;
	}

	/**
	 * @param mixed $captured
	 */
	protected function _setCaptured ( $captured )
	{
		$this->_captured = $captured;
	}

	/**
	 * @param mixed $isCascaded
	 */
	protected function _setIsCascaded ( $isCascaded )
	{
		$this->_isCascaded = $isCascaded;
	}

	/**
	 * @param mixed $card
	 */
	protected function _setCard ( $card )
	{
		$cardObg = new \com\checkout\ApiServices\Cards\ResponseModels\Card($card);
		$this->_card = $cardObg;
	}

	/**
	 * @param mixed $shippingDetails
	 */
	protected function _setShippingDetails ( $shippingDetails )
	{
		$shippingAddress  = new \com\checkout\ApiServices\SharedModels\ShippingAddress();
		$phone  = new \com\checkout\ApiServices\SharedModels\Phone();
		$shippingAddress->setAddressLine1($shippingDetails->getAddressLine1());
		$shippingAddress->setAddressLine2($shippingDetails->getAddressLine2());
		$shippingAddress->setPostcode($shippingDetails->getPostcode());
		$shippingAddress->setCountry($shippingDetails->getCountry());
		$shippingAddress->setCity($shippingDetails->getCity());
		$shippingAddress->setState($shippingDetails->getState());
		$phone->setNumber($shippingDetails->getPhone()->getNumber());
		$shippingAddress->setPhone($phone);
		$shippingAddress->setRecipientName($shippingDetails->getRecipientName());
		$this->_shippingDetails = $shippingAddress;
	}

	/**
	 * @param mixed $products
	 */
	protected function _setProducts ( $products )
	{
		$productsArray = $products->toArray();
		$productsToReturn = array();
		if($productsArray) {
			foreach($productsArray as $item){
				$product  = new \com\checkout\ApiServices\SharedModels\Product();
				$product->setName($item['name']);
				$product->setDescription($item['description']);
				$product->setSku($item['sku']);
				$product->setPrice($item['price']);
				$product->setQuantity($item['quantity']);
				$product->setImage($item['image']);
				$product->setShippingCost($item['shippingCost']);
				$product->setTrackingUrl($item['trackingUrl']);
				$productsToReturn[] = $product;
			}
		}
		$this->_products = $productsToReturn;
	}

	/**
	 * @param mixed $refunds
	 */
	protected function _setRefunds ( $refunds )
	{

		$refundObj = new \com\checkout\ApiServices\Charges\ResponseModels\Refund();
		$refundObj->setAmount($refunds->getAmount());
		$refundObj->setCurrency($refunds->getCurrency());
		$refundObj->setCreated($refunds->getCreated());
		$refundObj->setObject($refunds->getObject());
		$refundObj->setBalanceTransaction($refunds->getBalanceTransaction());
		$this->_refunds = $refundObj;
	}

	/**
	 * @param mixed $localPayment
	 */
	protected function _setLocalPayment ( $localPayment )
	{
		$this->_localPayment = $localPayment;
	}

	/**
	 * @param mixed $descriptor
	 */
	protected function _setDescriptor ( $descriptor )
	{
		$descriptorObj  = new \com\checkout\ApiServices\SharedModels\Descriptor();
		$descriptorObj->setName($descriptor->getName());
		$descriptorObj->setCity($descriptor->getCity());
		$this->_descriptor = $descriptorObj;
	}

	/**
	 * @param mixed $metadata
	 */
	protected function _setMetadata ( $metadata )
	{
		$this->_metadata = $metadata->toArray();
	}

	/**
	 * @param null $response
	 */
	protected function _setResponse ( $response )
	{
		$this->_response = $response;
	}

    /**
     * @param mixed $transactionIndicator
     */
    protected function _setTransactionIndicator($transactionIndicator)
    {
        $this->_transactionIndicator = $transactionIndicator;
    }

    /**
	 * @param mixed $customerPaymentPlans
	 */
	protected function _setCustomerPaymentPlans ( $customerPaymentPlans )
	{
        $paymentPlansArray = $customerPaymentPlans->toArray();
		$paymentPlansToReturn = array();
		if($paymentPlansArray) {
			foreach($paymentPlansArray as $item){
				$paymentPlan  = new \com\checkout\ApiServices\SharedModels\CustomerPaymentPlan();
				$paymentPlan->setPlanId($item['planId']);
				$paymentPlan->setName($item['name']);
				$paymentPlan->setPlanTrackId($item['planTrackId']);
				$paymentPlan->setAutoCapTime($item['autoCapTime']);
				$paymentPlan->setCurrency($item['currency']);
				$paymentPlan->setValue($item['value']);
				$paymentPlan->setCycle($item['cycle']);
				$paymentPlan->setRecurringCount($item['recurringCount']);
				$paymentPlan->setStatus($item['status']);
				$paymentPlan->setCustomerPlanId($item['customerPlanId']);
				$paymentPlan->setRecurringCountLeft($item['recurringCountLeft']);
				$paymentPlan->setTotalCollectedValue($item['totalCollectedValue']);
				$paymentPlan->setTotalCollectedCount($item['totalCollectedCount']);
				$paymentPlan->setStartDate($item['startDate']);
				$paymentPlan->setPreviousRecurringDate($item['previousRecurringDate']);
				$paymentPlan->setNextRecurringDate($item['nextRecurringDate']);
				$paymentPlansToReturn[] = $paymentPlan;
			}
		}

		$this->_customerPaymentPlans = $paymentPlansToReturn;
	}

	/**
	 * @param mixed $redirectUrl
	 */
	protected function _setRedirectUrl($redirectUrl)
	{
		$this->_redirectUrl = $redirectUrl;
	}

    /**
     * @param mixed $paymentToken
     */
    protected function _setPaymentToken($paymentToken)
    {
        $this->_paymentToken = $paymentToken;
    }

    /**
     * @param mixed $responseType
     */
    private function _setResponseType($chargeMode, $redirectUrl)
    {
        if ($redirectUrl && $chargeMode == 2){
            $this->_responseType = "3dCharge";
        } elseif ($redirectUrl && $chargeMode == 1){
            $this->_responseType = "attemptN3dCharge";
        } else{
            $this->_responseType = "normal";
        }
    }
}
