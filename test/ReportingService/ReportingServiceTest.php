<?php
/**
 * Created by PhpStorm.
 * Date: 22.12.2015
 * Time: 12:57
 */

namespace test\ReportingService;
use test\TestHelper;

include '../../autoload.php';

class ReportingServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Date: 23.12.2015
     */
    public function testQueryTransactionException() {
        $apiClient          = new \com\checkout\ApiClient('sk_test_a2dba067-bfe8-425c-88e9-6685820aa16e');
        $reportingService   = $apiClient->reportingService();

        $transactionFilter  = new \com\checkout\ApiServices\Reporting\RequestModels\TransactionFilter();

        try {
            $reportingResponse  = $reportingService->queryTransaction($transactionFilter);
        }
        catch (\Exception $expected) {
            return;
        }

        $this->fail('An expected exception has not been raised.');
    }

    /**
     * Date: 23.12.2015
     */
    public function testTransactionFilterRequestModel() {
        $requestModel = TestHelper::getTransactionFilterRequestModel();

        $this->assertEquals('2015-07-06T13:57:34.450Z', $requestModel->getFromDate());
        $this->assertEquals('2015-07-10T13:57:34.450Z', $requestModel->getToDate());
        $this->assertEquals(10, $requestModel->getPageSize());
        $this->assertEquals(5, $requestModel->getPageNumber());
        $this->assertEquals('ID', $requestModel->getSortColumn());
        $this->assertEquals('ASC', $requestModel->getSortOrder());
        $this->assertEquals('Authorised', $requestModel->getSearch());
    }

    /**
     * @throws \Exception
     *
     * Date: 23.12.2015
     */
    public function testTransactionFilterResponseModel() {
        $reportingUri       = new \com\checkout\helpers\ApiUrls();
        $reportingUri       = $reportingUri->getQueryTransactionApiUri();
        $secretKey          = 'sk_test_a2dba067-bfe8-425c-88e9-6685820aa16e';

        $requestModel       = TestHelper::getTransactionFilterRequestModel();
        $reportingMapper    = new \com\checkout\ApiServices\Reporting\ReportingMapper($requestModel);

        $requestReporting   = array (
            'authorization' => $secretKey,
            'mode'          => 'sandbox',
            'postedParam'   => $reportingMapper->requestReportingConverter(),

        );

        $processReporting   = \com\checkout\helpers\ApiHttpClient::postRequest($reportingUri, $secretKey, $requestReporting);
        $responseModel      = new \com\checkout\ApiServices\Reporting\ResponseModels\TransactionList($processReporting);

        $this->assertEquals(10, $responseModel->getPageSize());
        $this->assertEquals(5, $responseModel->getPageNumber());
        $this->assertEquals(200, $responseModel->getHttpStatus());
        $this->assertFalse($responseModel->hasError());
    }

    /**
     * Date: 23.12.2015
     */
    public function testRequestReportingConverter() {
        $requestModel           = TestHelper::getTransactionFilterRequestModel();
        $reportingMapper        = new \com\checkout\ApiServices\Reporting\ReportingMapper($requestModel);
        $reportingMapperData    = $reportingMapper->requestReportingConverter();

        $this->assertEquals('2015-07-06T13:57:34.450Z', $reportingMapperData['fromDate']);
        $this->assertEquals('2015-07-10T13:57:34.450Z', $reportingMapperData['toDate']);
        $this->assertEquals(10, $reportingMapperData['pageSize']);
        $this->assertEquals(5, $reportingMapperData['pageNumber']);
        $this->assertEquals('ID', $reportingMapperData['sortColumn']);
        $this->assertEquals('ASC', $reportingMapperData['sortOrder']);
        $this->assertEquals('Authorised', $reportingMapperData['search']);
    }
}
 