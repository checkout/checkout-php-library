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
    /**
     * @before
     */
    public function setup()
    {

        $this->_apiClient = new \com\checkout\ApiClient('sk_CC937715-4F68-4306-BCBE-640B249A4D50');
    }

    public function testVerifyChargeByPaymentToken()
    {
        $paymentToken ="pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d";// payment token for the JS charge
        $chargeResponse = $this->_apiClient->chargeService()->verifyCharge($paymentToken);

        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertNotNull($chargeResponse->getId());
    }

    public function _testChargeWithCardToken()
    {
        $paymentToken = "pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d";// payment token for the JS charge
        $chargeService = $this->_apiClient->chargeService();
        $cardToken = "card_tok_220E97F3-4DA3-4F09-B7AE-C633D8D5E3E2";
        $cardTokenModel = \test\TestHelper::getCardTokenChargeModel();
        $cardTokenModel->setCardToken($cardToken);
        $chargeResponse = $chargeService->chargeWithCardToken($cardTokenModel);
        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->setTransactionIndicator(1, $chargeResponse->getHttpStatus());
        $this->assertNotNull($chargeResponse->getId());


    }

    public function testCreateChargeWithCard()
    {
        $paymentToken = "pay_tok_5cfe03ee-20fc-45fc-9169-b039f8835b6d";// payment token for the JS charge
        $chargeService = $this->_apiClient->chargeService();
        $cardToken = "card_tok_220E97F3-4DA3-4F09-B7AE-C633D8D5E3E2";
        $cardTokenModel = \test\TestHelper::getCardTokenChargeModel();
        $cardTokenModel->setCardToken($cardToken);
        $chargeResponse = $chargeService->chargeWithCardToken($cardTokenModel);
        $this->assertFalse( $chargeResponse->hasError());
        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->setTransactionIndicator(1, $chargeResponse->getHttpStatus());
        $this->assertNotNull($chargeResponse->getId());


    }


}
 