<?php

/**
 *
 * CheckoutApi_Client_ClientGW3
 * gateway 3.0 class
 * @category     Adapter
 * @author       Dhiraj Gangoosirdar <dhiraj.gangoosirdar@checkout.com>
 * @copyright 2014 Integration team (http://www.checkout.com)
 * @link http://dev.checkout.com/ref/?shell#introduction
 */

/**
 * Class CheckoutApi_Client_ClientGW3
 * This class in an interface to the Checkout Gateway 3.0.
 * It provide access to all endpoint setup by the gateway.
 * The simplest usage would be example creating a card token:
 *      $secretKey = 'sk_test_CC937715-4F68-4306-BCBE-640B249A4D50';
 *      $cardTokenConfig = array();
 *      $cardTokenConfig['authorization'] = "$publicKey" ;
 *      $Api = CheckoutApi_Api::getApi();
 *      $cardTokenConfig['postedParam'] = array (
 *                                              'email' =>'dhiraj@checkout.com',
 *                                               'card' => array(
 *                                               'phoneNumber'=>'0123465789',
 *                                               'name'=>'test name',
 *                                               'number' => '4543474002249996',
 *                                               'expiryMonth' => 06,
 *                                               'expiryYear' => 2017,
 *                                               'cvv' => 956,
 *                                               )
 *                                           );
 *     $respondCardToken = $Api->getCardToken( $cardTokenConfig );
 *     if($respondCardToken->isValid()) {
 *        echo $respondCardToken->getId();
 *     } else {
 *          echo $respondCardToken->printError();
 *      }
 *
 *   Those couple of lines , will create an instance of the CheckoutApi_Client_ClientGW3.
 *   It will then will request a card token to the token, with a set of arguments.
 *   if the repond is valid , we can print out the result else we can print out the errors
 *
 *

 */
class CheckoutApi_Client_ClientGW3 extends CheckoutApi_Client_Client
{
	/** @var string $_uriCharge to store uri for charge url **/

	protected $_uriCharge = null;

	/** *@var string  $_uriToken to store uri for token url **/

    protected $_uriToken = null;

	/** @var string $_uriCustomer  to store uri for customer url **/

    protected $_uriCustomer = null;

	/** @var string $_uriProvider to store uri for customer url */

    protected $_uriProvider = null;
    /** @var string  $_mode dev|preprod|live the url that the library will use , dev , preprod or live */
	private $_mode = 'dev';


    /**
     * Constructor
     * @param array $config configuration for class
     */
	public function __construct(array $config = array())
	{

		parent::__construct($config);

		if($mode = $this->getMode()) {
			$this->setMode($mode);
		}

		$this->setUriCharge();
        $this->setUriToken();
        $this->setUriCustomer();
        $this->setUriProvider();
        $this->setUriRecurringPayments();
	}

    /**
     * Create Card Token
     * @param array $param payload for creating a card token parameter
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *          $param['postedParam'] = array (
     *                                    'email'   =>    'dhiraj@checkout.com',
     *                                    'card'    =>    array(
     *                                                            'phoneNumber'      => '0123465789',
     *                                                             'name'             => 'test name',
     *                                                             'number'           => 'XXXXXXXXX',
     *                                                             'expiryYear'       => 2017,
     *                                                              'cvv'              => 956
     *                                                           )
     *                                   );
     *          $respondCardToken = $Api->getCardToken( $param );
     *  Use by having, first an instance of the gateway 3.0 and set of arguments as above
     */

    public function getCardToken(array $param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::TOKEN_CARD_TYPE;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $isEmailValid = CheckoutApi_Client_Validation_GW3::isEmailValid($postedParam);
        $isCardValid = CheckoutApi_Client_Validation_GW3::isCardValid($postedParam);
       
        $uri = $this->getUriToken().'/card';

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Create payment token
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *
     * Simple usage:
     *      $sessionConfig['postedParam'] = array( "value"=>100, "currency"=>"GBP");
     *      $sessionTokenObj = $Api->getPaymentToken($sessionConfig);
     * Use by having, first an instance of the gateway 3.0 and set of argument base on documentation for creating a session token.
     *
     */

    public  function  getPaymentToken(array $param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::TOKEN_SESSION_TYPE;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $isAmountValid = CheckoutApi_Client_Validation_GW3::isValueValid($postedParam);
        $isCurrencyValid = CheckoutApi_Client_Validation_GW3::isValidCurrency($postedParam);
        $uri = $this->getUriToken().'/payment';

        if(!$isAmountValid) {
            $hasError =  true;
            $this->throwException('Please provide a valid amount (in cents)', array('pram'=>$param));
        }

        if(!$isCurrencyValid) {
            $hasError =  true;
            $this->throwException('Please provide a valid currency code (ISO currency code)', array('pram'=>$param));
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Create Charge
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * This methods can be call to create charge for checkout.com gateway 3.0 by passing
     * full card details :
     *  $param['postedParam'] = array ( 'email'=>'dhiraj@checkout.com',
     *                                   'value'=>100,
     *                                    'currency'=>'usd',
     *                                   'description'=>'desc',
     *                                   'caputure'=>false,
     *
     *                                   'card' => array(
     *
     *                                   'phoneNumber'=>'0123465789',
     *                                   'name'=>'test name',
     *                                   'number' => '4543474002249996',
     *                                   'expiryMonth' => 06,
     *                                   'expiryYear' => 2017,
     *                                   'cvv' => 956,
     *
                                        )
                                     );
     * or by passing a card token:
     *  $param['postedParam'] = array ( 'email'=>'dhiraj@checkout.com',
     *                                   'value'=>100,
     *                                    'currency'=>'usd',
     *                                   'description'=>'desc',
     *                                   'caputure'=>false,
     *                                    'cardToken'=>'card_tok_2d033cf7-1542-4a3d-bd08-bd9d26533551'
     *                                   )
     *
     * or by passing a card id:
     * $param['postedParam'] = array ( 'email'=>'dhiraj@checkout.com',
     *                                   'value'=>100,
     *                                   'currency'=>'usd',
     *                                   'description'=>'desc',
     *                                   'caputure'=>false,
     *                                   'cardId'=>'card_fb10a0a5-05ef-4254-ac85-3aa221e8d50d'
     *                                   )
     * and then just call the method:
     *       $charge = $Api->createCharge($param);
     *
     */
    public function createCharge(array $param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $isAmountValid = CheckoutApi_Client_Validation_GW3::isValueValid($postedParam);
        $isCurrencyValid = CheckoutApi_Client_Validation_GW3::isValidCurrency($postedParam);
        $isEmailValid = CheckoutApi_Client_Validation_GW3::isEmailValid($postedParam);
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($postedParam);
        $isCardValid = CheckoutApi_Client_Validation_GW3::isCardValid($postedParam);
        $isCardIdValid = CheckoutApi_Client_Validation_GW3::isCardIdValid($postedParam);
        $isCardTokenValid = CheckoutApi_Client_Validation_GW3::isCardToken($postedParam);


        if(!$isEmailValid && !$isCustomerIdValid) {
            $hasError =  true;
            $this->throwException('Please provide a valid Email address or Customer id', array('param'=>$postedParam));
        }

        if($isCardTokenValid) {
            if(isset($postedParam['card'])) {
                $this->throwException('unset card object', array('param'=>$postedParam),false);
               // unset($param['postedParam']['card']);
            }
            $this->setUriCharge('','token');

        }elseif($isCardValid) {

            if(isset($postedParam['token'])){
                $this->throwException('unset invalid token object', array('param'=>$postedParam),false);
                unset($param['postedParam']['token']);
            }
            $this->setUriCharge('','card');

        }elseif($isCardIdValid) {
            $this->setUriCharge('','card');

            if(isset($postedParam['token'])){
                $this->throwException('unset invalid token object', array('param'=>$postedParam),false);
                unset($param['postedParam']['token']);
            }

            if(isset($postedParam['card'])) {
                $this->throwException('unset invalid token object', array('param' => $postedParam), false);

                if (isset($param['postedParam']['card']['name'])) {
                    unset($param['postedParam']['card']['name']);
                }

                if (isset($param['postedParam']['card']['number'])) {
                    unset($param['postedParam']['card']['number']);
                }

                if (isset($param['postedParam']['card']['expiryMonth'])) {
                    unset($param['postedParam']['card']['expiryMonth']);
                }

                if (isset($param['postedParam']['card']['expiryYear'])) {
                    unset($param['postedParam']['card']['expiryYear']);
                }
            }

        } elseif($isEmailValid || $isCustomerIdValid){
            $this->setUriCharge('','customer');
        } else {
            $hasError =  true;
            $this->throwException('Please provide  either a valid card token or a card object or a card id', array('pram'=>$param));
        }

        if(!$isAmountValid) {
            $hasError =  true;
            $this->throwException('Please provide a valid amount (in cents)', array('pram'=>$param));
        }

        if(!$isCurrencyValid) {
            $hasError =  true;
            $this->throwException('Please provide a valid currency code (ISO currency code)', array('pram'=>$param));
        }

        return $this->_responseUpdateStatus($this->request( $this->getUriCharge() ,$param,!$hasError));
    }


    public function verifyChargePaymentToken(array $param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $this->flushState();

        $isTokenValid = CheckoutApi_Client_Validation_GW3::isPaymentToken($param);
        $uri = $this->getUriCharge();

        if(!$isTokenValid) {
            $hasError = true;
            $this->throwException('Please provide a valid payment token ',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['paymentToken']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Refund  Info
     * This method returns the Captured amount, total refunded amount and the amount remaing
     * to refund
     *
     * $refundInfo = $Api->getRefundInfo($param);
     *
     */
    public function getRefundAmountInfo($param){

        $chargeHistory = $this->getChargeHistory($param);
        $charges = $chargeHistory->getCharges();
        $chargesArray = $charges->toArray();
        $totalRefunded = 0;

        foreach($chargesArray as $num => $values) {
            if (in_array(CheckoutApi_Client_Constant::STATUS_CAPTURE,$values)){  
                $capturedAmount = $values[ 'value' ];
            }

            if (in_array(CheckoutApi_Client_Constant::STATUS_REFUND,$values)){  
                    $totalRefunded += $values[ 'value' ];
            }
        }

        $refundInfo = array(
            'capturedAmount' => $capturedAmount,
            'totalRefunded' => $totalRefunded,
            'remainingAmount' => $capturedAmount - $totalRefunded
        );

        return $refundInfo;         
    }
    
    /**
     * Refund  Charge
     *  This method refunds a Card Charge that has previously been created but not yet refunded
     *  or void a charge that has been capture
     *
     * @param array $param payload param for refund a charge
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *      $param['postedParam'] = array (
                                        'value'=>150
                                    );
     *      $refundCharge = $Api->refundCharge($param);
     *
     */

    public function  refundCharge($param)
    {
        $chargeHistory = $this->getChargeHistory($param);
        $charges = $chargeHistory->getCharges();
        $uri = $this->getUriCharge();

        if(!empty($charges)) {
          $chargesArray = $charges->toArray();
          $toRefund = false;
          $toVoid = false;
          $toRefundData = false;
          $toVoidData = false;
          
          foreach ($chargesArray as $key=> $charge) {
            if (in_array(CheckoutApi_Client_Constant::STATUS_CAPTURE, $charge) 
				|| in_array(CheckoutApi_Client_Constant::STATUS_REFUND,$charge)){    
                if(strtolower($charge['status']) == strtolower(CheckoutApi_Client_Constant::STATUS_CAPTURE)) {
                  $toRefund = true;
                  $toRefundData = $charge;
                  break;
              }
            }
            else {
                $toVoid = true;
                $toVoidData = $charge;
              }
          }

          if($toRefund) {
              $refundChargeId = $toRefundData['id'];
              $param['chargeId'] = $refundChargeId;
              $uri = "$uri/{$param['chargeId']}/refund";
          }

          if($toVoid) {
              $voidChargeId = $toVoidData['id'];
              $param['chargeId'] = $voidChargeId;
              $uri = "$uri/{$param['chargeId']}/void";
          }
        }
        else {
          $this->throwException('Please provide a valid charge id',array('param'=>$param));
        }

        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_POST;
        $postedParam = $param['postedParam'];
        
        $this->flushState();
        $isAmountValid = CheckoutApi_Client_Validation_GW3::isValueValid($postedParam);
        $isChargeIdValid = CheckoutApi_Client_Validation_GW3::isChargeIdValid($param);

        if(!$isChargeIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid charge id',array('param'=>$param));

        }
        
        if(!$isAmountValid) {
             $this->throwException('Please provide a amount (in cents)',array('param'=>$param),false);
        }
         return $this->_responseUpdateStatus($this->request($uri ,$param,!$hasError));
    }

    /**
     * Void  Charge
     *  This method void a Card Charge that has previously been created
     *
     *
     * @param array $param payload param for void a charge
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *      $param['postedParam'] = array ('value'=>150);
     *      $refundCharge = $Api->refundCharge($param);
     *
     */

    public function  voidCharge($param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $isAmountValid = CheckoutApi_Client_Validation_GW3::isValueValid($postedParam);
        $isChargeIdValid = CheckoutApi_Client_Validation_GW3::isChargeIdValid($param);
        $uri = $this->getUriCharge();

        if(!$isChargeIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid charge id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['chargeId']}/void";
        }
        if(!$isAmountValid) {
            $this->throwException('Please provide a amount (in cents)',array('param'=>$param),false);
        }

        return $this->_responseUpdateStatus($this->request( $uri ,$param,!$hasError));
    }
    /**
     * Capture   Charge.
     * This method allow you to capture the payment of an existing, authorised, Card Charge
     * @param array $param payload param for caputring a charge
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *      $param['postedParam'] = array ( 'value'=>150 );
     *      captureCharge = $Api->captureCharge($param);
     */

    public function  captureCharge($param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_POST;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $isAmountValid = CheckoutApi_Client_Validation_GW3::isValueValid($postedParam);
        $isChargeIdValid = CheckoutApi_Client_Validation_GW3::isChargeIdValid($param);
        $uri = $this->getUriCharge();

        if(!$isChargeIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid charge id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['chargeId']}/capture";
        }
        if(!$isAmountValid) {
            $this->throwException('Please provide a amount (in cents)',array('param'=>$param),false);
        }

        return $this->_responseUpdateStatus($this->request( $uri ,$param,!$hasError));
    }

    /**
     * Update   Charge.
     * Updates the specified Card Charge by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      $param['postedParam'] = array ('description'=> 'dhiraj is doing some test');
     *      $updateCharge = $Api->updateCharge($param);
     */

    public function  updateCharge($param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;

        $this->flushState();

        $isChargeIdValid = CheckoutApi_Client_Validation_GW3::isChargeIdValid($param);
        $uri = $this->getUriCharge();

        if(!$isChargeIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid charge id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['chargeId']}";
        }

        return $this->_responseUpdateStatus($this->request( $this->getUriCharge() ,$param,!$hasError));
    }
 /**
     * Update MetaData   Charge.
     * Updates the specified Card Charge by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *     
     *      $updateCharge = $Api->updateMetadata($param array('keycode'=>$value));
     */

    public function  updateMetadata($chargeObj, $metaData = array())
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;

        $this->flushState();

        $chargeId = $chargeObj->getId();
        $metaArray = array();

        if($chargeObj->getMetadata()) {
            $metaArray = $chargeObj->getMetadata()->toArray();
        }
     
        $newMetadata = array_merge($metaArray,$metaData);

        $param['postedParam']['metadata']    =    $newMetadata;
        $uri = $this->getUriCharge();
        $uri = "$uri/{$chargeId}";
       

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Update Trackid   Charge.
     * Updates the specified Card Charge by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      
     *      $updateCharge = $Api->updateTrackId($chargeObj, $trackId);
     */

    public function  updateTrackId($chargeObj, $trackId)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;

        $this->flushState();

        $chargeId = $chargeObj->getId();
       
        $param['postedParam']['trackId']    =    $trackId;
        $uri = $this->getUriCharge();
        $uri = "$uri/{$chargeId}";
       

        return $this->request( $uri ,$param,!$hasError);
    }
    
        /**
     * Update PaymentToken Charge.
     * Updates the specified Card Charge by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      
     *      $updatePaymentToken = $Api->updatePaymentToken($paymentToken);
     */

    public function  updatePaymentToken($param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;

        $this->flushState();
            
        $uri = $this->getUriToken()."/payment/{$param['paymentToken']}";
        
        return $this->request($uri ,$param,!$hasError);
    }

    /**
     * Get   Charge.
     * Get the specified Card Charge by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      $param['postedParam'] = array ('description'=> 'dhiraj is doing some test');
     *      $updateCharge = $Api->updateCharge($param);
     */

    public function  getCharge($param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;

        $this->flushState();

        $isChargeIdValid = CheckoutApi_Client_Validation_GW3::isChargeIdValid($param);
        $uri = $this->getUriCharge();

        if(!$isChargeIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid charge id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['chargeId']}";
        }

        return  $this->_responseUpdateStatus($this->request($uri ,$param,!$hasError));
    }

    public  function getChargeHistory($param) {

        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::CHARGE_TYPE;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;

        $this->flushState();

        $isChargeIdValid = CheckoutApi_Client_Validation_GW3::isChargeIdValid($param);
        $uri = $this->getUriCharge();

        if(!$isChargeIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid charge id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['chargeId']}/history";
        }

        return  $this->request($uri ,$param,!$hasError);
    }

    /**
     * Create LocalPayment Charge.
     * Creates a LocalPayment Charge using a Session Token and
     * @param array $param payload param for creating a localpayment
     * @return CheckoutApi_Lib_RespondObj
     * This can be call in this way:
     *      $chargeLocalPaymentConfig['authorization'] = $publicKey ;
     *      $param['postedParam'] = array(
     *               'email'        =>  'dhiraj.checkout@checkout.com',
     *               'token'        =>   $Api->getSessionToken($sessionConfig),
     *               'localPayment' =>  array(
     *                                      'lppId'  => $Api->getLocalPaymentProvider($localPaymentConfig)->getId()
     *                                   )
     *       ) ;
     *      $chargeLocalPaymentObj = $Api->createLocalPaymentCharge($chargeLocalPaymentConfig);
     */

    public function createLocalPaymentCharge($param)
    {
        $hasError = false;
        $param['postedParam']['type'] = CheckoutApi_Client_Constant::LOCALPAYMENT_CHARGE_TYPE;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $uri = $this->getUriCharge();
        $isValidEmail = CheckoutApi_Client_Validation_GW3::isEmailValid($postedParam);
        $isValidSessionToken = CheckoutApi_Client_Validation_GW3::isSessionToken($postedParam);
        $isValidLocalPaymentHash = CheckoutApi_Client_Validation_GW3::isLocalPyamentHashValid($postedParam);
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_POST;
        if(!$isValidEmail){
            $hasError = true;
            $this->throwException('Please provide a valid email address',array('postedParam'=>$postedParam));
        }

        if(!$isValidSessionToken){
            $hasError = true;
            $this->throwException('Please provide a valid session token',array('postedParam'=>$postedParam));
        }

        if(!$isValidLocalPaymentHash){
            $hasError = true;
            $this->throwException('Please provide a local payment hash',array('postedParam'=>$postedParam));
        }

        if(!isset($param['postedParam']['localPayment']['userData']) ) {
            $param['postedParam']['localPayment']['userData'] = '{}';
        }
        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Create a customer
     * @param array $param payload param for creating a customer
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * This method can be call in the following way:
     *      $customerConfig['postedParam'] = array (
     *                                           'email'        => 'dhiraj@checkout.com',
     *                                           'name'         => 'test customer',
     *                                           'description'  => 'desc',
     *                                           'card'         =>  array(
     *                                                               'name'        => 'test name',
     *                                                               'number'      => '4543474002249996',
     *                                                               'expiryMonth' => 06,
     *                                                               'expiryYear'  => 2017,
     *                                                               'cvv'         => 956,
     *
     *                                                              )
     *                                          );
     *      $customer = $Api->createCustomer($customerConfig);
     */

    public  function createCustomer($param)
    {
        $hasError = false;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_POST;
        $postedParam = $param['postedParam'];
        $this->flushState();
        $uri = $this->getUriCustomer();
        $isValidEmail = CheckoutApi_Client_Validation_GW3::isEmailValid($postedParam);
        $isCardValid = CheckoutApi_Client_Validation_GW3::isCardValid($postedParam);
        $isTokenValid = CheckoutApi_Client_Validation_GW3::isCardToken($postedParam);

        if(!$isValidEmail) {
            $hasError = true;
            $this->throwException('Please provide a valid Email Address',array('param'=>$param));
        }

        if($isTokenValid) {
            if(isset($postedParam['card'])) {
                $this->throwException('unsetting card object',array('param'=>$param),false);
                unset($param['postedParam']['card']);
            }
        }elseif($isCardValid) {
            if(isset($postedParam['token'])){
                $this->throwException('unsetting token ',array('param'=>$param),false);
                unset($param['postedParam']['token']);
            }
        }else {
            $hasError = true;
            $this->throwException('Please provide a valid card detail or card token',array('param'=>$param));
        }

        return $this->request( $uri ,$param,!$hasError);
    }


    /**
     * Get Customer
     * @param array $param payload param for returning a single customer
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage :
     *      $param['customerId'] = {customerId} ;
     *      $getCustomer = $Api->getCustomer($param);
     */

    public  function getCustomer($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $this->flushState();
        $uri = $this->getUriCustomer();
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Update Customer
     * @param array $param payload param for updating
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * This method can be call in the following way:
     *
     *      $param['customerId'] = {$customerId} ;
     *      $param['postedParam'] = array (
     *                          'email'         =>  'dhiraj@checkout.com',
     *                          'name'          =>  'customer name',
     *                          'description'   =>  'desc',
     *                          'card'          =>   array(
     *                                                      'name'        =>  'test name',
     *                                                      'number'      =>  '4543474002249996',
     *                                                      'expiryMonth' =>  06,
     *                                                      'expiryYear'  =>  2017,
     *                                                      'cvv'         =>  956,
     *
     *                                                       )
     *                          );
     *      $customerUpdate = $Api->updateCustomer($param);
     */

    public  function updateCustomer($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;
        $this->flushState();
        $uri = $this->getUriCustomer();
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Getting a list of customer
     * @param array $param payload param for getting list of customer.
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple Usage:
     *       $param['count'] = 100 ;
     *       $param['from_date'] = '09/30/2014' ;
     *       $param['to_date'] = '10/02/2014' ;
     *       $customerUpdate = $Api->getListCustomer($param);
     */

    public function getListCustomer($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $this->flushState();
        $uri = $this->getUriCustomer();
        $delimiter = '?';
        $createdAt = 'created=';

        if(isset($param['created_on'])) {
            $uri="{$uri}{$delimiter}{$createdAt}{$param['created_on']}|";
            $delimiter = '&';

        }else {
            if (isset($param['from_date'])) {
                $fromDate = time($param['from_date']);
                $uri = "{$uri}{$delimiter}{$createdAt}{$fromDate}";
                $delimiter = '&';
                $createdAt = '|';
            }

            if (isset($param['to_date'])) {
                $toDate = time($param['to_date']);
                $uri = "{$uri}{$createdAt}{$toDate}";
                $delimiter = '&';

            }
        }

        if(isset($param['count'])){

            $uri =  "{$uri}{$delimiter}count={$param['count']}";
            $delimiter = '&';
        }

        if(isset($param['offset'])){
            $uri =  "{$uri}{$delimiter}offset={$param['offset']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Delete a customer
     * @param array $param payload param for deleteing a customer
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * This method can be call this way:
     *      $param['customerId'] = {$customerId} ;
     *      $deleteCustomer = $Api->deleteCustomer($param);
     */

    public function deleteCustomer($param)
    {
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_DELETE;
        $this->flushState();
        $uri = $this->getUriCustomer();
        $hasError = false;
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);
        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Creating a card, link to a customer
     * @param array $param payload param for creating a card
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *
     *      $param['customerId'] = $Api->createCustomer($customerConfig)->getId() ;
     *      $param['postedParam'] = array (
     *               'customerID'=> $customerId,
     *               'card' => array(
     *               'name'=>'test name',
     *               'number' => '4543474002249996',
     *               'expiryMonth' => 06,
     *               'expiryYear' => 2017,
     *               'cvv' => 956,
     *               )
     *       );
     *      $cardObj = $Api->createCard($param);
     * The creadCard method can be call this way and it required a customer id
     */

    public function createCard($param)
    {

        $this->flushState();
        $uri = $this->getUriCustomer();
        $hasError = false;
        $postedParam = $param['postedParam'];
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);
        $isCardValid = CheckoutApi_Client_Validation_GW3::isCardValid($postedParam);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerId']}/cards";
        }

        if(!$isCardValid) {
            $hasError = true;
            $this->throwException('Please provide a valid card object',array('param'=>$param));
        }
        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Update a card
     * @param array $param payload param for update a card
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      $param['customerId'] = $customerId ;
     *       $param['cardId'] = $cardId ;
     *      $param['postedParam'] = array (
     *                              'card'        =>  array(
     *                              'name'        =>  'New name',
     *                              'number'      => '4543474002249996',
     *                              'expiryMonth' => 08,
     *                              'expiryYear'  => 2017,
     *                              'cvv'         => 956,
     *                              )
     *                  );
     *      $updateCardObj = $Api->updateCard($param);
     */

    public function updateCard($param)
    {
        $this->flushState();
        $uri = $this->getUriCustomer();
        $hasError = false;

      //  $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);
        $isCardIdValid = CheckoutApi_Client_Validation_GW3::isGetCardIdValid($param);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));

        }elseif(!$isCardIdValid){
            $hasError = true;
            $this->throwException('Please provide a valid card id',array('param'=>$param));
        } else {

            $uri = "$uri/{$param['customerId']}/cards/{$param['cardId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get a card
     * @param array $param payload param for getting a card info
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *       $param['customerId'] = $customerId ;
     *       $param['cardId'] = $cardId ;
     *       $getCardObj = $Api->getCard($param);
     *
     * Required a customer id and a card id to work
     *
     */

    public function getCard($param)
    {
        $this->flushState();
        $uri = $this->getUriCustomer();
        $hasError = false;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);
        $isCardIdValid = CheckoutApi_Client_Validation_GW3::isGetCardIdValid($param);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));

        }elseif(!$isCardIdValid){
            $hasError = true;
            $this->throwException('Please provide a valid card id',array('param'=>$param));
        } else {

            $uri = "$uri/{$param['customerId']}/cards/{$param['cardId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get Card List
     * @param array $param payload param for getting a list of cart
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *      $param['customerId'] = $customerId ;
     *      $getCardListObj = $Api->getCardList($param);
     * Require a customer id
     */

    public function getCardList($param)
    {
        $this->flushState();
        $uri = $this->getUriCustomer();
        $hasError = false;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['customerId']}/cards";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get Card List
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *       $param['customerId'] = $customerId ;
     *       $param['cardId'] = $cardId ;
     *       $deleteCard = $Api->deleteCard($param);
     */

    public function deleteCard($param)
    {
        $this->flushState();
        $uri = $this->getUriCustomer();
        $hasError = false;
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_DELETE;
        $isCustomerIdValid = CheckoutApi_Client_Validation_GW3::isCustomerIdValid($param);
        $isCardIdValid = CheckoutApi_Client_Validation_GW3::isGetCardIdValid($param);

        if(!$isCustomerIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer id',array('param'=>$param));

        }elseif(!$isCardIdValid){
            $hasError = true;
            $this->throwException('Please provide a valid card id',array('param'=>$param));
        } else {

            $uri = "$uri/{$param['customerId']}/cards/{$param['cardId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get LocalPayment Provider list
     * @param array $param payload param for retriving a list of local payment provider
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *       $param['token'] = $sessionToken ;
     *       $localPaymentListObj = $Api->getLocalPaymentList($param);
     * refer to create sesssionToken for getting the session token value
     *
     */
    public function  getLocalPaymentList($param)
    {
        $this->flushState();
        $uri = $this->getUriProvider();
        $hasError = false;
        $isTokenValid = CheckoutApi_Client_Validation_GW3::isSessionToken($param);
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $delimiter = '/localpayments?';

        if(!$isTokenValid) {
            $hasError = true;
            $this->throwException('Please provide a valid session token',array('param'=>$param));
        }else {

            $uri = "{$uri}{$delimiter}token={$param['token']}";
            $delimiter ='&';

            if(isset($param['countryCode'])){
                $uri = "{$uri}{$delimiter}countryCode={$param['countryCode']}";
                $delimiter ='&';
            }

            if(isset($param['ip'])){
                $uri = "{$uri}{$delimiter}ip={$param['ip']}";
                $delimiter ='&';
            }

            if(isset($param['limit'])){
                $uri = "{$uri}{$delimiter}limit={$param['limit']}";
                $delimiter ='&';
            }

            if(isset($param['region'])){
                $uri = "{$uri}{$delimiter}region={$param['region']}";
                $delimiter ='&';
            }

            if(isset($param['name'])){
                $uri = "{$uri}{$delimiter}name={$param['name']}";

            }
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get LocalPayment Provider
     * @param array $param payload param for getting a local payment provider dettail
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *          $param['token'] = $sessionToken ;
                 $param['providerId'] = $providerId ;
                $localPaymentObj = $Api->getLocalPaymentProvider($param);
     */

    public  function getLocalPaymentProvider($param)
    {
        $this->flushState();
        $uri = $this->getUriProvider();
        $hasError = false;
        $isTokenValid = CheckoutApi_Client_Validation_GW3::isSessionToken($param);
        $isValidProvider = CheckoutApi_Client_Validation_GW3::isProvider($param);
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $delimiter = '/localpayments/';

        if(!$isTokenValid) {
            $hasError = true;
            $this->throwException('Please provide a valid session token',array('param'=>$param));
        }

        if(!$isValidProvider)
        {
            $hasError = true;
            $this->throwException('Please provide a valid provider id',array('param'=>$param));
        }

        if(!$hasError){
            $uri = "{$uri}{$delimiter}{$param['providerId']}?token={$param['token']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get Card Provider list
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage:
     *       $cardProviderListObj = $Api->getCardProvidersList($param);
     */

    public function getCardProvidersList($param)
    {
        $this->flushState();
        $uri = $this->getUriProvider().'/cards';
        $hasError = false;
        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     *  Get a list of card provider
     * @param array $param payload param for retriving a list of card by providers
     * @return CheckoutApi_Lib_RespondObj
     * Simple usage:
     *      $param['providerId'] = $providerId ;
     *      $cardProvidersObj = $Api->getCardProvider($param);
     */
    public function getCardProvider($param)
    {
        $this->flushState();
        $isValidProvider = CheckoutApi_Client_Validation_GW3::isProvider($param);
        $uri = $this->getUriProvider().'/cards';
        $hasError = false;
        if(!$isValidProvider)
        {
            $hasError = true;
            $this->throwException('Please provide a valid provider id',array('param'=>$param));
        }

        if(!$hasError){
            $uri = "{$uri}/{$param['providerId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Update   Recurring Payment Plan.
     * Updates the specified Recurring Payment Plan by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      $param['planId'] = {$planId} ;
     *      $param['postedParam'] = array (
     *                          'name'          =>  'New subscription name',
     *                          'planTrackId'   =>  'newPlanTrackId',
     *                          'autoCapTime'   =>  24,
     *                          'value'   =>  200,
     *                          'status'   =>  4
     *                          );
     *      $updateCharge = $Api->updateCharge($param);
     */

    public function  updatePaymentPlan($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;
        $this->flushState();

        $uri = $this->getUriRecurringPayments().'/plans';;
        $isPlanIdValid = CheckoutApi_Client_Validation_GW3::isPlanIdValid($param);

        if(!$isPlanIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid plan id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['planId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Cancel a payment plan
     * @param array $param payload param for deleting a payment plan
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * This method can be call this way:
     *      $param['planId'] = {$planId} ;
     *      cancelPaymentPlan = $Api->cancelPaymentPlan($param);
     */

    public function cancelPaymentPlan($param)
    {
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_DELETE;
        $this->flushState();
        $uri = $this->getUriRecurringPayments().'/plans';
        $hasError = false;
        $isPlanIdValid = CheckoutApi_Client_Validation_GW3::isPlanIdValid($param);
        if(!$isPlanIdValid ) {
            $hasError = true;
            $this->throwException('Please provide a valid plan id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['planId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get payment plan
     * @param array $param payload param for returning a payment plan
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage :
     *      $param['planId'] = {planId} ;
     *      $getPaymentPlan = $Api->getPaymentPlan($param);
     */

    public  function getPaymentPlan($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $this->flushState();
        $uri = $this->getUriRecurringPayments().'/plans';;
        $isPlanIdValid = CheckoutApi_Client_Validation_GW3::isPlanIdValid($param);

        if(!$isPlanIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid plan id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Update   Recurring Customer Payment Plan.
     * Updates the specified Recurring Customer Payment Plan by setting the values of the parameters passed.
     * @param array $param payload param
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     *  Simple usage:
     *      $param['customerPlanId'] = {$customerPlanId} ;
     *      $param['postedParam'] = array (
     *                          'cardId'   =>  'card_XXXXXXXX',
     *                          'status'   =>  1
     *                          );
     *      $updateCharge = $Api->updateCharge($param);
     */

    public function  updateCustomerPaymentPlan($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_PUT;
        $this->flushState();

        $uri = $this->getUriRecurringPayments().'/customers';;
        $isCustomerPlanIdValid = CheckoutApi_Client_Validation_GW3::isCustomerPlanIdValid($param);

        if(!$isCustomerPlanIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid customer plan id',array('param'=>$param));

        } else {

            $uri = "$uri/{$param['customerPlanId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Cancel a customer payment plan
     * @param array $param payload param for deleting a payment plan
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * This method can be call this way:
     *      $param['customerPlanId'] = {$customerPlanId} ;
     *      cancelCustomerPaymentPlan = $Api->cancelCustomerPaymentPlan($param);
     */

    public function cancelCustomerPaymentPlan($param)
    {
        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_DELETE;
        $this->flushState();
        $uri = $this->getUriRecurringPayments().'/customers';
        $hasError = false;
        $isCustomerPlanIdValid = CheckoutApi_Client_Validation_GW3::isCustomerPlanIdValid($param);
        if(!$isCustomerPlanIdValid ) {
            $hasError = true;
            $this->throwException('Please provide a valid customer plan id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerPlanId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Get customer payment plan
     * @param array $param payload param for returning a payment plan
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     * Simple usage :
     *      $param['customerPlanId'] = {customerPlanId} ;
     *      $getCustomerPaymentPlan = $Api->getCustomerPaymentPlan($param);
     */

    public  function getCustomerPaymentPlan($param)
    {
        $hasError = false;

        $param['method'] = CheckoutApi_Client_Adapter_Constant::API_GET;
        $this->flushState();
        $uri = $this->getUriRecurringPayments().'/customers';;
        $isCustomerPlanIdValid = CheckoutApi_Client_Validation_GW3::isCustomerPlanIdValid($param);

        if(!$isCustomerPlanIdValid) {
            $hasError = true;
            $this->throwException('Please provide a valid plan id',array('param'=>$param));
        }else {

            $uri = "$uri/{$param['customerPlanId']}";
        }

        return $this->request( $uri ,$param,!$hasError);
    }

    /**
     * Build up the request to the gateway
     * @param string $uri endpoint to be used
     * @param array $param payload param
     * @param boolean $state if error occured don't send charge
     * @return CheckoutApi_Lib_RespondObj
     * @throws Exception
     */

    public function request($uri,array $param, $state)
    {

        /** @var CheckoutApi_Lib_RespondObj $respond */
        $respond = CheckoutApi_Lib_Factory::getSingletonInstance('CheckoutApi_Lib_RespondObj');
        $this->setConfig($param);

        if(!isset($param['postedParam'])) {

            $param['postedParam'] = array();
        }
        $param['rawpostedParam'] = $param['postedParam'];
        $param['postedParam'] = $this->getParser()->preparePosted($param['postedParam']);

        $respondArray = null;

        if($state){
            $headers = $this->initHeader();
            $param['headers'] = $headers;

            /** @var CheckoutApi_Client_Adapter_Abstract $adapter */
            $adapter =  $this->getAdapter($this->getProcessType(),array('uri'=>$uri,'config'=>$param));

            if($adapter){
                $adapter->connect();
                $respondString = $adapter->request()->getRespond();
                $statusResponse = $adapter->getResourceInfo();
                $this->getParser()->setResourceInfo($statusResponse);
                $respond = $this->getParser()->parseToObj($respondString);

                if($respond && isset($respond['errors'])  && $respond->hasErrors()  ) {

                    /** @var CheckoutApi_Lib_ExceptionState  $exceptionStateObj */
                    $exceptionStateObj = $respond->getExceptionState();
                    $errors = $respond->getErrors()->toArray();
                    $exceptionStateObj->flushState();

                    foreach( $errors as $error) {
                        $this->throwException($error, $respond->getErrors()->toArray());
                    }
                }elseif( $respond && isset($respond['errorCode']) && $respond->hasErrorCode()) {
                    /** @var CheckoutApi_Lib_ExceptionState  $exceptionStateObj */
                    $exceptionStateObj = $respond->getExceptionState();

                    $this->throwException($respond->getMessage(),$respond->toArray() );

                }elseif($respond && $respond->getHttpStatus()!='200') {
                    $this->throwException('Gateway is temporary down',$param );
                }

                $adapter->close();
            }

        }

        return $respond;
    }

    /**
     * initialising  headers for transport layer
     * @return array headers value
     */
     private  function initHeader()
     {
         $headers = array('Authorization: '. $this->getAuthorization());
         $this->setHeaders($headers);
         return $this->getHeaders();
     }

    /**
     * Setting which mode we are running live, preprod or dev
     * @param string $mode setting in which mode will be the request
     * @throws Exception
     */

	public function setMode( $mode)
	{

		$this->_mode = $mode;
		$this->setConfig(array('mode'=>$mode));
	}

    /**
     * return the mode . can be either dev or preprod or live
     * @return string
     */

	public function getMode()
	{
        if(isset($this->_config['mode']) && $this->_config['mode']) {
            $this->_mode =$this->_config['mode'];
        }
        
		return $this->_mode;
	}

    /**
     * A method that set it charge url
     * @param  string  $uri set the endpoint url
     * @param  string $sufix a sufix to the cart token
     */
	public function setUriCharge( $uri = '',$sufix ='')
	{
		$toSetUri = $uri;
		if(!$uri) {
			$toSetUri = $this->getUriPrefix().'charges';
		}

        if($sufix) {
            $toSetUri .= "/$sufix";
        }

		$this->_uriCharge = $toSetUri;
	}

    /**
     * return $_uriCharge value
     * @return string
     */
	public function getUriCharge()
	{
		return $this->_uriCharge ;
	}

    /**
     * set uri token
     * @param null|string $uri the uri for the token
     */

	public function setUriToken($uri = null)
	{
		$toSetUri = $uri;
		if(!$uri) {
			$toSetUri = $this->getUriPrefix().'tokens';
		}

		$this->_uriToken = $toSetUri;
	}

    /**
     * return uri token
     * @return string
     */

	public function getUriToken()
	{
	    return $this->_uriToken ;
	}

    /**
     * set customer uri
     * @param null|string $uri endpoint url for customer
     */

	public function setUriCustomer( $uri = null)
	{
		$toSetUri = $uri;
		if(!$uri) {
			$toSetUri = $this->getUriPrefix().'customers';
		}

		$this->_uriCustomer = $toSetUri;
	}

    /**
     * return customer uri
     * @return string
     */
	public function getUriCustomer()
	{
	    return $this->_uriCustomer ;
	}

    /**
     * set provider uri
     * @param null|string $uri  endpoint url for provider
     *
     */

	public function setUriProvider( $uri = null)
	{
		$toSetUri = $uri;
		if(!$uri) {
			$toSetUri = $this->getUriPrefix().'providers';
		}

		$this->_uriProvider = $toSetUri;
	}

    /**
     * return provider uri
     * @return string
     */

	public function getUriProvider()
	{
        return $this->_uriProvider ;
	}

    /**
     * set uri recurring payments
     * @param null|string $uri the uri for the recurring payments
     */

    public function setUriRecurringPayments($uri = null)
    {
        $toSetUri = $uri;
        if(!$uri) {
            $toSetUri = $this->getUriPrefix().'recurringPayments';
        }

        $this->_uriRecurringPayments = $toSetUri;
    }

    /**
     * return uri recurring payments
     * @return string
     */

    public function getUriRecurringPayments()
    {
        return $this->_uriRecurringPayments ;
    }

    /**
     * return which uri prefix to be used base on mode type
     * @return string
     */

	private function getUriPrefix()
	{
		$mode = strtolower($this->getMode());
		switch ($mode) {
			case 'live':
				$prefix = CheckoutApi_Client_Constant::APIGW3_URI_PREFIX_LIVE.CheckoutApi_Client_Constant::VERSION.'/';
				break;
            default :
                $prefix = CheckoutApi_Client_Constant::APIGW3_URI_PREFIX_SANDBOX.CheckoutApi_Client_Constant::VERSION.'/';
                break;    
		}
		return $prefix;
	}

    /**
     * setting exception state log
     * @param string $message error message
     * @param array $stackTrace statck trace
     * @param boolean $error if it's an error
     */

    private function throwException($message,array $stackTrace , $error = true )
    {
        $this->exception($message,$stackTrace,$error);
    }

    /**
     * flushing all config
     * @todo need to remove singleton concept causing issue
     * @reset all state
     * @throws Exception
     */
    public function flushState()
    {
        parent::flushState();
        if($mode = $this->getMode()) {
            $this->setMode($mode);
        }
        $this->setUriCharge();
        $this->setUriToken();
        $this->setUriCustomer();
        $this->setUriProvider();
        $this->setUriRecurringPayments();

    }

    /**
     * @param $config array of configuration
     * @return string script tag
     */
    public function getJsConfig($config)
    {
       $renderMode = isset($config['renderMode'])?$config['renderMode']:0;
       $config['widgetRenderedEvent'] = isset($config['widgetRenderedEvent'])?$config['widgetRenderedEvent']:'';
       $config['cardTokenReceivedEvent'] = isset($config['cardTokenReceivedEvent'])?$config['cardTokenReceivedEvent']:'';
       $config['readyEvent'] = isset($config['readyEvent'])?$config['readyEvent']:'';
        $script = " window.CKOConfig = {
                debugMode: false,
                renderMode:{$renderMode},
                publicKey: '{$config['publicKey']}',
                customerEmail: '{$config['email']}',
                namespace: 'CheckoutIntegration',
                customerName: '{$config['name']}',
                value: '{$config['amount']}',
                currency: '{$config['currency']}',
                widgetContainerSelector: '{$config['widgetSelector']}',
                cardTokenReceived: function(event) {
                    {$config['cardTokenReceivedEvent']}
                },
                 widgetRendered: function (event) {
                    {$config['widgetRenderedEvent']}
                 },

                ready: function() {
                     {$config['readyEvent']};

                }
            }";
        return $script;
    }

    public function chargeToObj($charge)
    {
         if($charge) {
            $response = $this->_responseUpdateStatus($this->getParser()->parseToObj($charge));

           return $response;

        }
        return null;
    }



    private function _responseUpdateStatus($response)
    {

            if($response->hasStatus() && $response->hasHttpStatus() && $response->hasHttpStatus() ==200) {
                $response->setCaptured ( $response->getStatus () == 'Captured' );
                $response->setAuthorised ( $response->getStatus () == 'Authorised' );
                $response->setRefunded ( $response->getStatus () == 'Refunded' );
                $response->setVoided ( $response->getStatus () == 'Voided' );
                $response->setExpired ( $response->getStatus () == 'Expired' );
                $response->setDecline ( $response->getStatus () == 'Decline' );
            }elseif( $response->hasMessage() &&  !$response->hasErrorCode()) {
               $responseMessage =   $response->getMessage();
               $responseMessage->setCaptured ($responseMessage->getStatus () == 'Captured' );
               $responseMessage->setAuthorised ($responseMessage->getStatus () == 'Authorised' );
               $responseMessage->setRefunded ($responseMessage->getStatus () == 'Refunded' );
               $responseMessage->setVoided ($responseMessage->getStatus () == 'Voided' );
               $responseMessage->setExpired ($responseMessage->getStatus () == 'Expired' );
               $responseMessage->setDecline ($responseMessage->getStatus () == 'Decline' );
                return $responseMessage;
            }
     

        return $response;
    }
    
    public static function validateRequest($validationFields,$chargeObject)
    {

        $result = array('status'=>true,'message'=>array());
        if(isset($validationFields['currency']) && strtolower($validationFields['currency']) != strtolower($chargeObject->getCurrency()) ) {
            $result['status'] = false;
            $result['message'][] = 'Currency mismatch'. ' Charge currency: '.$chargeObject->getCurrency(). ' and order currency: '.$validationFields['currency'];
        }

        if(isset($validationFields['value']) && $validationFields['value'] != $chargeObject->getValue() ) {
            $result['status'] = false;
            $result['message'][] = 'Amount mismatch '. ' Charge Amount:'.$chargeObject->getValue(). ' and order amount: '.$validationFields['value'];

        }

        if(isset($validationFields['trackId']) && $validationFields['trackId'] != $chargeObject->getTrackId() ) {
            $result['status'] = false;
            $result['message'][] = 'Track id mismatch'. ' Charge Track id:'.$chargeObject->getTrackId(). ' and order Track id: '.$validationFields['trackId'];

        }

        return $result;

    }
    
    public function valueToDecimal($amount, $currencySymbol)
    {
      $currency = strtoupper($currencySymbol);
      $threeDecimalCurrencyList = array('BHD', 'LYD', 'JOD', 'IQD', 'KWD', 'OMR', 'TND');
      $zeroDecimalCurencyList = array('BYR', 'XOF', 'BIF', 'XAF', 'KMF', 'XOF', 'DJF', 'XPF', 'GNF', 'JPY', 'KRW', 'PYG', 'RWF', 'VUV', 'VND');

      if (in_array($currency, $threeDecimalCurrencyList)) { 
        $value = (int) ($amount * 1000);
        
      } elseif (in_array($currency, $zeroDecimalCurencyList)){
         $value = floor ($amount);   
         
      } else {

        $value = round($amount * 100);
        
      }
      
      return $value;
      
    }
    
    public function decimalToValue($amount, $currencySymbol)
    {
      $currency = strtoupper($currencySymbol);
      $threeDecimalCurrencyList = array('BHD', 'LYD', 'JOD', 'IQD', 'KWD', 'OMR', 'TND');
      $zeroDecimalCurencyList = array('BYR', 'XOF', 'BIF', 'XAF', 'KMF', 'XOF', 'DJF', 'XPF', 'GNF', 'JPY', 'KRW', 'PYG', 'RWF', 'VUV', 'VND');

      if (in_array($currency, $threeDecimalCurrencyList)) { 
        $value =  $amount / 1000;
        
      } elseif (in_array($currency, $zeroDecimalCurencyList)){
         $value = $amount;   
         
      } else {
        $value = $amount / 100;
        
      }
      
      return $value;
      
    }
	
	/**
     * Check charge response
	 * If response is approve or has error, return boolean
    */
	public function isAuthorise($response){
        $result = false;
        $hasError = $this->isError($response);
        $isApprove = $this->isApprove($response);

        if(!$hasError && $isApprove){
            $result = true;
        }

        return $result;
    }

	/**
	 * Check if response contain error code
	 * return boolean
    */
    protected function isError($response){
        $hasError = false;

        if($response->getErrorCode()){
            $hasError =  true;
        }

        return $hasError;
    }

	/**
	 * Check if response is approve
	 * return boolean
    */
    protected function isApprove($response){
        $result = false;

        if($response->getResponseCode() == CheckoutApi_Client_Constant::RESPONSE_CODE_APPROVED
            || $response->getResponseCode()== CheckoutApi_Client_Constant::RESPONSE_CODE_APPROVED_RISK ){
            $result = true;
        }

        return $result;
    }

	/**
	 * return eventId if charge has error.
	 * return chargeID if charge is decline
    */
    public function getResponseId($response){
        $isError = $this->isError($response);

        if($isError){
            $result = array (
                'message' => $response->getMessage(),
                'eventId' => $response->getEventId()
            );

            return $result;

        } else {
            $result = array (
                'responseMessage' => $response->getResponseMessage(),
                'id' => $response->getId()
            );

            return $result;
        }
    }

	/**
	 * Check if response is flag
	 * return response message
    */
    public function isFlagResponse($response){
        $result = false;

        if($response->getResponseCode() == CheckoutApi_Client_Constant::RESPONSE_CODE_APPROVED_RISK){
            $result = array(
                'responseMessage' => $response->getResponseMessage(),
            );
        }

        return $result;
    }
}
