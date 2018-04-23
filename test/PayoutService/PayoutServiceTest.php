<?php
/**
 * User: Santiago del Puerto
 * Date: 13/04/2018
 */

namespace test\PayoutService;
use test\TestHelper;
use \com\checkout;
use \com\checkout\ApiServices;
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
        $this->_apiClient = new \com\checkout\ApiClient('sk_test_48f56d9a-47c0-48d6-a4c9-af3715d9b463');
    }

    public function testPayout()
    {
        $chargeService = $this->_apiClient->customerService();
        $customerResponse = $customerService->getCustomer('cust_52F28582-125E-4350-9294-C9C62E9D9E86');
        $destination = $customerResponse->getCards()->getData()[0]->getId();
        
        $payoutService = $this->_apiClient->payoutService();
        $payoutRequest = new \com\checkout\ApiServices\Payouts\RequestModels\PayoutCreate();
        $payoutRequest->setCurrency("GBP");
        $payoutRequest->setDestination($destination);
        $payoutRequest->setFirstName("John");
        $payoutRequest->setLastName("Smith");
        $payoutRequest->setValue(300);
        
        $payoutResponse = $payoutService->createPayout($payoutRequest);

        $this->assertFalse( $payoutResponse->hasError());
        $this->assertEquals(200, $payoutResponse->getHttpStatus());
        $this->assertNotNull($payoutResponse->getId());
    }
    
} 