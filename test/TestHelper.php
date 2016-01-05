<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 11/06/2015
 * Time: 13:23
 */

namespace test;


final class TestHelper
{

    public static function getCardTokenChargeModel()
    {
        $cardTokenChargePayload = new \com\checkout\ApiServices\Charges\RequestModels\CardTokenChargeCreate();
        $cardTokenChargePayload->setEmail(TestHelper::getRandName().'@'.TestHelper::getRandName().'.com');
        $cardTokenChargePayload->setAutoCapture('N');
        $cardTokenChargePayload->setAutoCaptime('0');
        $cardTokenChargePayload->setValue('100');
        $cardTokenChargePayload->setCurrency('usd');
        $cardTokenChargePayload->setTrackId('TrackId-'.rand(0,1000));
        $cardTokenChargePayload->setShippingDetails(TestHelper::getMockUpAddress());
        $cardTokenChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardTokenChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardTokenChargePayload->setTransactionIndicator(1);
        return $cardTokenChargePayload;
    }

    public static function  getBaseChargeModel($cardChargePayload)
    {
        $cardChargePayload->setEmail(TestHelper::getRandName().'@'.TestHelper::getRandName().'.com');
        $cardChargePayload->setAutoCapture('N');
        $cardChargePayload->setAutoCaptime('0');
        $cardChargePayload->setValue('100');
        $cardChargePayload->setCurrency('usd');
        $cardChargePayload->setTrackId('TrackId-'.rand(0,100));

        $cardChargePayload->setTransactionIndicator(1);
        $cardChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardChargePayload->setShippingDetails(TestHelper::getMockUpAddress());
        return $cardChargePayload;
    }

    public static function  getMockUpAddress()
    {
        $billingDetails = new \com\checkout\ApiServices\SharedModels\Address();

        $billingDetails->setAddressLine1('1 Glading Fields');
        $billingDetails->setAddressLine2('Second line');
        $billingDetails->setPostcode('N16 2BR');
        $billingDetails->setCountry('GB');
        $billingDetails->setCity('London');
        $billingDetails->setState('Uk');
        $billingDetails->setPhone(TestHelper::getMockUpPhone());

        return $billingDetails;
    }

    public static function  getMockUpPhone()
    {
        $phone  = new \com\checkout\ApiServices\SharedModels\Phone();
        $phone->setNumber("203 583 44 55");
        $phone->setCountryCode("44");
        return $phone;
    }

    public static function  getMockUpProduct()
    {

        $product = new \com\checkout\ApiServices\SharedModels\Product();
        $product->setName('Product-'.TestHelper::getRandName());
        $product->setDescription('Description-'.TestHelper::getRandName());
        $product->setQuantity(rand(0,5));
        $product->setShippingCost(rand(0,10));
        $product->setSku('Sku-'.TestHelper::getRandName().'-'.rand(0,100));
        $product->setTrackingUrl('http://www.'.TestHelper::getRandName().'.com');

        return $product;
    }

    public static function  getMockUpBaseChargeModel()
    {
        $baseChargePayload = new \com\checkout\ApiServices\Charges\RequestModels\BaseCharge();
        $baseChargePayload->setEmail(TestHelper::getRandName().'@checkout.com');
        $baseChargePayload->setAutoCapture('N');
        $baseChargePayload->setAutoCaptime('0');
        $baseChargePayload->setValue('100');
        $baseChargePayload->setCurrency('usd');
        $baseChargePayload->setTrackId('TrackId-'.rand(0,1000));
        $baseChargePayload->setShippingDetails(TestHelper::getMockUpAddress());
        return $baseChargePayload;
    }

    public  static function getMockUpBaseCard()
    {
        $baseCardCreateObject = new \com\checkout\ApiServices\Cards\RequestModels\BaseCardCreate();
        $baseCardCreateObject->setNumber('4543474002249996');
        $baseCardCreateObject->setName('Test Name');
        $baseCardCreateObject->setExpiryMonth('06');
        $baseCardCreateObject->setExpiryYear('2017');
        $baseCardCreateObject->setCvv('956');
        $baseCardCreateObject->setBillingDetails(TestHelper::getMockUpAddress());
        return $baseCardCreateObject;

    }

    public static function  getMockUpVoidCharge($chargeService)
    {

        $cardChargeModel = new \com\checkout\ApiServices\Charges\RequestModels\CardIdChargeCreate();
        $chargePayload = \test\TestHelper::getBaseChargeModel($cardChargeModel);
        $chargePayload->setCardId('card_0b5f6a81-2cc0-47cb-859b-601f7f97eebd');
        $chargePayload->setCustomerId('cust_E282D596-A5F9-4A9D-AE37-B92C0B0C2C55');
        $chargePayload->setEmail(TestHelper::getRandName().'@checkout.com');

        $chargeResponse = $chargeService->chargeWithCardId($chargePayload);
        return $chargeResponse;
    }

    public static function getRandName()
    {
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $base = strlen($charset);
        $result = '';

        $nowR = explode(' ', microtime());
        $now = $nowR[1];
        while ($now >= $base){
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -5);
    }
    public function getCardToken()
    {

        $cardTokenConfig['authorization'] = "pk_test_88a9f52e-17e3-4a3f-a11e-669757454288" ;

        $Api = \CheckoutApi_Api::getApi();
        $cardTokenConfig['postedParam'] = array (


                'number' => '4543474002249996',
                'expiryMonth' => 06,
                'expiryYear' => 2017,
                'cvv' => 956,

        );
        $respondCardToken = $Api->getCardToken( $cardTokenConfig );

        if($respondCardToken->isValid()) {
            return  $respondCardToken->getId();
        }

        return null;

    }

    public function getMockUpCharge()
    {
        $chargeService =  new \com\checkout\ApiClient('sk_test_a2dba067-bfe8-425c-88e9-6685820aa16e');
        $baseCardModel = \test\TestHelper::getMockUpBaseCard();
        $cardChargeModel = new \com\checkout\ApiServices\Charges\RequestModels\CardChargeCreate();
        $chargePayload = \test\TestHelper::getBaseChargeModel($cardChargeModel);
        $chargePayload->setBaseCardCreate($baseCardModel);
        $chargeResponse = $chargeService->chargeService()->chargeWithCard($chargePayload);

        return $chargeResponse;

    }

    public function getMockUpCaptureCharge()
    {
        $chargeService =  new \com\checkout\ApiClient('sk_test_a2dba067-bfe8-425c-88e9-6685820aa16e');
        $baseCardModel = \test\TestHelper::getMockUpBaseCard();
        $cardChargeModel = new \com\checkout\ApiServices\Charges\RequestModels\CardChargeCreate();
        $chargePayload = \test\TestHelper::getBaseChargeModel($cardChargeModel);
        $chargePayload->setBaseCardCreate($baseCardModel);
        $chargeResponse = $chargeService->chargeService()->chargeWithCard($chargePayload);

        $chargeCapturePayload = new \com\checkout\ApiServices\Charges\RequestModels\ChargeCapture();

        $chargeCapturePayload->setChargeId($chargeResponse->getId());
        $chargeCapturePayload->setValue($chargeResponse->getValue());

        return $chargeService->chargeService()->CaptureCardCharge($chargeCapturePayload);

    }

    /**
     * @return \com\checkout\ApiServices\Reporting\RequestModels\TransactionFilter
     *
     * Date: 23.12.2015
     */
    public static function getTransactionFilterRequestModel() {
        $requestModel = new \com\checkout\ApiServices\Reporting\RequestModels\TransactionFilter();

        $requestModel->setFromDate('2015-07-06T13:57:34.450Z');
        $requestModel->setToDate('2015-07-10T13:57:34.450Z');
        $requestModel->setPageSize(10);
        $requestModel->setPageNumber(5);
        $requestModel->setSortColumn('ID');
        $requestModel->setSortOrder('ASC');
        $requestModel->setSearch('Authorised');
        $requestModel->setFilters(array(
            array(
                'action'    => 'include',
                'field'     => 'status',
                'operator'  => 'CONTAINS',
                'value'     => 'Authorised'
            ),
            array(
                'action'    => 'include',
                'field'     => 'email',
                'operator'  => 'CONTAINS',
                'value'     => '@'
            ),
        ));

        return $requestModel;
    }
} 