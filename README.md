### Requirements

PHP 5 > 5.3.0

### How to use the library

Add the latest version of checkout-php-library into your project by using Composer or manually:

__Using Composer (Recommended)__

Either run the following command in the root directory of your project:
```
composer require checkout/checkout-php-api
```

Or require the Checkout.com package inside the composer.json of your project:
```
"require": {
    "php": ">=5.2.4",
    "checkout/checkout-php-api": "1.2.16"
},
```
__Manually__

Download or clone the github repository, [master](https://github.com/checkout/checkout-php-library/archive/master.zip) or download a [release](https://github.com/checkout/checkout-php-library/releases), and manually add it to your project.

### Example

After adding the library to your project, include the file autoload.php found in root of the library.
```html
include 'checkout-php-api/autoload.php';
```
You will be required to set the secret key when initialising a new **APIClient** instance. You will also have option for other configurations defined in AppSettings.php file. 

The constructor available for configuration:
```html
 __construct($secretKey, $env = 'sandbox' ,$debugMode = false, $connectTimeout = 60, $readTimeout =60)

 //Example:
use com\checkout;
$apiClient = new checkout\ApiClient('sk_test_XXXXXXXXXXXX');
```
By default both **$connectTimeout** and **$readTimeout** are to 60 seconds. You may change them as needed.

**$env** accepts either `'sandbox'` or `'live'` as value.  This parameter allow you to shift between the sandbox environment or live environment. By Default the sandbox environment will be used. 

### Sample code for:

  - [Tokens](https://github.com/checkout/checkout-php-library/wiki/Tokens)
  
  - [Charges](https://github.com/checkout/checkout-php-library/wiki/Charges)
  
  - [Cards](https://github.com/checkout/checkout-php-library/wiki/Cards)
  
  - [Customers](https://github.com/checkout/checkout-php-library/wiki/Customers)

  - [Recurring Payments](https://github.com/checkout/checkout-php-library/wiki/RecurringPayments)
  
  - [Local Payment Providers](https://github.com/checkout/checkout-php-library/wiki/lpp)

  - [Reporting](https://github.com/checkout/checkout-php-library/wiki/Reporting)

  - [Visa Checkout](https://github.com/checkout/checkout-php-library/wiki/VisaCheckout)
