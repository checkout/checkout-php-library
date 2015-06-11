<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 09/06/2015
 * Time: 09:38
 */

namespace test\ChargeService;
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

        $this->assertEquals(200, $chargeResponse->getHttpStatus());
        $this->assertNotNull($chargeResponse->getId());
    }
}
 