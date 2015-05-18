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

**Create payment token**
```html
include 'release/v1.0//autoload.php'
use  com\checkout;
$apiClient = new ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
$tokenService = $apiClient->tokenService();
$tokenPayload = new ApiServices\Tokens\RequestModels\PaymentTokenCreate();
$metaData = array('key'=>'value');
$product = new ApiServices\SharedModels\Product();
$shippingDetails = new ApiServices\SharedModels\Address();
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
	$paymentToken = $tokenService->createPaymentToken($tokenPayload);
	echo $paymentToken->getId();
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
###Creates a charge with full card details.
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
### Creates a charge with full card id.
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
