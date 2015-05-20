### Requirements

PHP 5 >=5.3.0

### How to use the library

Add the latest version of checkout-php-library {release/v{version number} into your project

###Example

Include the file autoload.php found in folder {release/v{version number}.
```html
include 'release/v1.0/autoload.php';
```
You will be required to set the secret key when initialising a new **APIClient ** instance. You will also have option for other configurations defined in AppSettings.php file. 
The constructor available for configuration:
```html
 __construct($secretKey, $env = 'sandbox' ,$debugMode = false, $connectTimeout = 60, $readTimeout =60)
```
By default both **$connectTimeout** and **$readTimeouset** to 60 seconds. You got option to change them as needed.
**$env** accept either **sandbox **or **live ** as value.  This parameter allow you to shift between the sandbox environment or live environment. By Default the sandbox environment will be used. 
###Sample code
  [Create payment token](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#create-payment-token)
  
  [Verify charge by payment token](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#verify-charge-by-payment-token)
  
   [Creates a charge with full card details](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#creates-a-charge-with-full-card-details)
   
[Creates a charge with full card id](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#creates-a-charge-with-full-card-id)

[Creates a charge with cardToken](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#creates-a-charge-with-cardtoken)

[Creates a charge with Default Customer Card](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#creates-a-charge-with-default-customer-card)

[Capture a charge](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#capture-a-charge)

[Refund a charge](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#refund-a-charge)

[Update a charge](https://github.com/CKOTech/checkout-php-library/tree/release/v1.0#update-a-charge)

###Create payment token
```html
include 'release/v1.0//autoload.php'
use  com\checkout;
$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
//create an instance of a token service
$tokenService = $apiClient->tokenService();
//initializing the request models
$tokenPayload = new ApiServices\Tokens\RequestModels\PaymentTokenCreate();
$metaData = array('key'=>'value');
$product = new ApiServices\SharedModels\Product();
//initializing the Address model to be use by the PaymentTokenCreate model
$shippingDetails = new ApiServices\SharedModels\Address();
//initializing the Phone model to be use by the Address model
$phone = new  ApiServices\SharedModels\Phone();

$product->setName('A4 office paper');
$product->setDescription('a4 white copy paper');
$product->setQuantity(1);
$product->setShippingCost(10);
$product->setSku('ABC123');
$product->setTrackingUrl('http://www.tracker.com');

$phone->setNumber("203 583 44 55");
$phone->setCountryCode("44");

$shippingDetails->setAddressLine1('1 Glading Fields"');
$shippingDetails->setPostcode('N16 2BR');
$shippingDetails->setCountry('GB');
$shippingDetails->setCity('London');
$shippingDetails->setPhone($phone);

$tokenPayload->setCurrency("GBP");
$tokenPayload->setAutoCapture("N");
$tokenPayload->setValue("100");
$tokenPayload->setCustomerIp("88.216.3.135");
$tokenPayload->setDescription("test");
$tokenPayload->setEmail("test@test.com");

$tokenPayload->setMetadata($metaData);
$tokenPayload->setProducts($product);

 
try {
/** @var ResponseModels\PaymentToken $paymentToken  **/
	$paymentToken = $tokenService->createPaymentToken($tokenPayload);

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}

```
###Verify charge by payment token


```html
include 'release/v1.0//autoload.php'
use  com\checkout;
$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();

try {
	$ChargeResponse = $charge->verifyCharge('pay_tok_B15F0DF8-5DAE-4902-BDB1-5C176B1815B1');

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
###Creates a charge with full card details
```html
namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$cardChargePayload = new Charges\RequestModels\CardChargeCreate();
$baseCardCreateObject = new Cards\RequestModels\BaseCardCreate();

$billingDetails = new SharedModels\Address();
$phone = new  SharedModels\Phone();

$phone->setNumber("203 583 44 55");
$phone->setCountryCode("44");

$billingDetails->setAddressLine1('1 Glading Fields"');
$billingDetails->setPostcode('N16 2BR');
$billingDetails->setCountry('GB');
$billingDetails->setCity('London');
$billingDetails->setPhone($phone);

$baseCardCreateObject->setNumber('4242424242424242');
$baseCardCreateObject->setName('Test Name');
$baseCardCreateObject->setExpiryMonth('06');
$baseCardCreateObject->setExpiryYear('2018');
$baseCardCreateObject->setCvv('100');
$baseCardCreateObject->setBillingDetails($billingDetails);

$cardChargePayload->setEmail('demo@checkout.com');
$cardChargePayload->setAutoCapture('N');
$cardChargePayload->setAutoCaptime('0');
$cardChargePayload->setValue('100');
$cardChargePayload->setCurrency('usd');
$cardChargePayload->setTrackId('Demo-0001');
$cardChargePayload->setBaseCardCreate($baseCardCreateObject);

try {
	$ChargeResponse = $charge->chargeWithCard($cardChargePayload);
	

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}

```
### Creates a charge with full card id
```html
namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$cardChargeIdPayload = new Charges\RequestModels\CardIdChargeCreate();


$billingDetails = new SharedModels\Address();
$phone = new  SharedModels\Phone();
//
$phone->setNumber("203 583 44 55");
$phone->setCountryCode("44");

$billingDetails->setAddressLine1('1 Glading Fields"');
$billingDetails->setPostcode('N16 2BR');
$billingDetails->setCountry('GB');
$billingDetails->setCity('London');
$billingDetails->setPhone($phone);


$cardChargeIdPayload->setEmail('demo@checkout.com');
$cardChargeIdPayload->setAutoCapture('N');
$cardChargeIdPayload->setAutoCaptime('0');
$cardChargeIdPayload->setValue('100');
$cardChargeIdPayload->setCurrency('usd');
$cardChargeIdPayload->setTrackId('Demo-0001');
$cardChargeIdPayload->setCardId('card_EE8E105F-E24A-4FB6-A5FE-F0355BA1E490');

try {
	$ChargeResponse = $charge->chargeWithCardId($cardChargeIdPayload);
	

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
### Creates a charge with cardToken.
```html
namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$CardTokenChargePayload = new Charges\RequestModels\CardTokenChargeCreate();


$billingDetails = new SharedModels\Address();
$phone = new  SharedModels\Phone();
//
$phone->setNumber("203 583 44 55");
$phone->setCountryCode("44");

$billingDetails->setAddressLine1('1 Glading Fields"');
$billingDetails->setPostcode('N16 2BR');
$billingDetails->setCountry('GB');
$billingDetails->setCity('London');
$billingDetails->setPhone($phone);


$CardTokenChargePayload->setEmail('demo@checkout.com');
$CardTokenChargePayload->setAutoCapture('N');
$CardTokenChargePayload->setAutoCaptime('0');
$CardTokenChargePayload->setValue('100');
$CardTokenChargePayload->setCurrency('usd');
$CardTokenChargePayload->setTrackId('Demo-0001');
$CardTokenChargePayload->setCardToken('card_EE8E105F-E24A-4FB6-A5FE-F0355BA1E490');

try {
	$ChargeResponse = $charge->chargeWithCardToken($CardTokenChargePayload);
	

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
### Creates a charge with Default Customer Card
```html
namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$baseChargePayload = new Charges\RequestModels\BaseCharge();


$_shippingDetails = new SharedModels\Address();
$phone = new  SharedModels\Phone();
//
$phone->setNumber("203 583 44 55");
$phone->setCountryCode("44");

$_shippingDetails->setAddressLine1('1 Glading Fields"');
$_shippingDetails->setPostcode('N16 2BR');
$_shippingDetails->setCountry('GB');
$_shippingDetails->setCity('London');
$_shippingDetails->setPhone($phone);


$baseChargePayload->setEmail('demo@checkout.com');
$baseChargePayload->setAutoCapture('N');
$baseChargePayload->setAutoCaptime('0');
$baseChargePayload->setValue('100');
$baseChargePayload->setCurrency('usd');
$baseChargePayload->setTrackId('Demo-0001');
$baseChargePayload->setShippingDetails($_shippingDetails);


try {
	$ChargeResponse = $charge->chargeWithDefaultCustomerCard($baseChargePayload);
	

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
### Capture a charge
```html

namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$chargeCapturePayload = new Charges\RequestModels\ChargeCapture();

$chargeCapturePayload->setChargeId('charge_F01A9ADDE74J76BD2F19');
$chargeCapturePayload->setValue('100');



try {
	$ChargeResponse = $charge->CaptureCardCharge($chargeCapturePayload);
	

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
###Refund a charge
```html
namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$chargeCapturePayload = new Charges\RequestModels\ChargeRefund();

$chargeCapturePayload->setChargeId('charge_221AEADDE74J76BD2F18');
$chargeCapturePayload->setValue('100');



try {
	$ChargeResponse = $charge->refundCardChargeRequest($chargeCapturePayload);
	

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
###Update a charge
```html
namespace com\checkout;
include 'checkout-php-library/autoload.php';

$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$charge = $apiClient->chargeService();
namespace com\checkout\ApiServices;
$chargeUpdatePayload = new Charges\RequestModels\ChargeUpdate();

$chargeUpdatePayload->setChargeId('charge_221AEADDE74J76BD2F18');
$chargeUpdatePayload->setDescription('Test charge');
$chargeUpdatePayload->setMetadata(array('test'=>'value'));



try {
	$ChargeResponse = $charge->UpdateCardCharge($chargeUpdatePayload);

}catch (Exception $e) {
     echo 'Caught exception: ',  $e->getMessage(), "\n";
}
```
