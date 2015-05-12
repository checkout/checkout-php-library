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
