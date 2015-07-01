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

        $this->_apiClient = new \com\checkout\ApiClient('sk_test_a2dba067-bfe8-425c-88e9-6685820aa16e');
        $this->_customerId = null;
        $this->_cardId = null;
    }

    public function testChargeWithCardToken()
    {
        $cardToken = \test\TestHelper::getCardToken();
        $chargeService = $this->_apiClient->chargeService();

        $cardTokenModel = \test\TestHelper::getCardTokenChargeModel();
        $cardTokenModel->setCardToken($cardToken);
        $chargeResponse = $chargeService->chargeWithCardToken($cardTokenModel);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());

    }


    public function testVerifyChargeByPaymentToken()
    {
        $paymentToken ="pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d";// payment token for the JS charge
        $chargeResponse = $this->_apiClient->chargeService()->verifyCharge($paymentToken);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
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
        $chargePayload->setCardId('card_0b5f6a81-2cc0-47cb-859b-601f7f97eebd');
        $chargePayload->setCustomerId('cust_E282D596-A5F9-4A9D-AE37-B92C0B0C2C55');
        $chargePayload->setEmail('ravish.ramrakha@checkout.com');

        $chargeResponse = $chargeService->chargeWithCardId($chargePayload);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());
    }

    public function testCreateChargeWithCustomerDefaultCard()
    {
        $chargeService = $this->_apiClient->chargeService();
        $cardChargeModel = new \com\checkout\ApiServices\Charges\RequestModels\CardIdChargeCreate();
        $chargePayload = \test\TestHelper::getBaseChargeModel($cardChargeModel);
        $chargePayload->setCardId('card_0b5f6a81-2cc0-47cb-859b-601f7f97eebd');
        $chargePayload->setCustomerId('cust_E282D596-A5F9-4A9D-AE37-B92C0B0C2C55');
        $chargePayload->setEmail('ravish.ramrakha@checkout.com');

        $chargeResponse = $chargeService->chargeWithCardId($chargePayload);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());
    }

    public function testGetCharge()
    {
        $chargeService = $this->_apiClient->chargeService();

        $chargeResponse = $chargeService->getCharge('pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d');
        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertEquals(1, $chargeResponse->getTransactionIndicator());
        $this->assertNotNull($chargeResponse->getId());
    }
}
 