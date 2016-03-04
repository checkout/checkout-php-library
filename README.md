### Requirements

PHP 5 > 5.3.0

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
###Sample code for:
  [Tokens](https://github.com/CKOTech/checkout-php-library/wiki/Tokens)
  
  [Charges](https://github.com/CKOTech/checkout-php-library/wiki/Charges)
  
  [Cards](https://github.com/CKOTech/checkout-php-library/wiki/Cards)
  
  [Customers](https://github.com/CKOTech/checkout-php-library/wiki/Customers)
  
