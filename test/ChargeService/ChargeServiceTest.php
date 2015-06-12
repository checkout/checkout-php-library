<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 09/06/2015
 * Time: 09:38
 */

namespace test\ChargeService;
use test\TestHelper;

include '../../autoload.php';

class ChargeServiceTest extends \PHPUnit_Framework_TestCase
{
    private $_apiClient ;
    private $_customerId;
    private $_cardId;
    /**
     * @before
     */
    public function setup()
    {

        $this->_apiClient = new \com\checkout\ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
        $this->_customerId = null;
        $this->_cardId = null;
    }

    public function testVerifyChargeByPaymentToken()
    {
        $paymentToken ="pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d";// payment token for the JS charge
        $chargeResponse = $this->_apiClient->chargeService()->verifyCharge($paymentToken);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertNotNull($chargeResponse->getId());
    }

    public function testChargeWithCardToken()
    {
        $paymentToken = "pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d";// payment token for the JS charge
        $chargeService = $this->_apiClient->chargeService();
        $cardToken = "card_tok_220E97F3-4DA3-4F09-B7AE-C633D8D5E3E2";
        $cardTokenModel = \test\TestHelper::getCardTokenChargeModel();
        $cardTokenModel->setCardToken($cardToken);
        $chargeResponse = $chargeService->chargeWithCardToken($cardTokenModel);
        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());



    }


    public function testCreateChargeWithCard()
    {
        $chargeService = $this->_apiClient->chargeService();
        $baseCardModel = \test\TestHelper::getMockUpBaseCard();
        $cardChargeModel = new \com\checkout\ApiServices\Charges\RequestModels\CardChargeCreate();
        $chargePayload = \test\TestHelper::getBaseChargeModel($cardChargeModel);
        $chargePayload->setBaseCardCreate($baseCardModel);
        $chargeResponse = $chargeService->chargeWithCard($chargePayload);
        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());

    }

    public function testChargeWithCardId()
    {
        $chargeService = $this->_apiClient->chargeService();
        $cardChargeModel = new \com\checkout\ApiServices\Charges\RequestModels\CardIdChargeCreate();
        $chargePayload = \test\TestHelper::getBaseChargeModel($cardChargeModel);
        $chargePayload->setCardId('card_2e54e808-dd51-4247-82f5-fd7ba7550953');
        $chargePayload->setCustomerId('cust_88AFA5F2-8F33-4887-BF60-CBDC6869D44D');
        $chargePayload->setEmail('Z3H5U@checkout.com');
        $chargeResponse = $chargeService->chargeWithCardId($chargePayload);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());
    }
}
 