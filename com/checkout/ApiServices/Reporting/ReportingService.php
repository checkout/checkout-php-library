<?php
/**
 * Created by PhpStorm.
 * Date: 22.12.2015
 * Time: 12:57
 */
namespace com\checkout\ApiServices\Reporting;

class ReportingService extends \com\checkout\ApiServices\BaseServices
{
    /**
     * @param RequestModels\TransactionFilter $requestModel
     * @return ResponseModels\TransactionList
     * @throws \Exception
     */
    public function queryTransaction(RequestModels\TransactionFilter $requestModel) {
        $reportingMapper    = new ReportingMapper($requestModel);
        $reportingUri       = $this->_apiUrl->getQueryTransactionApiUri();
        $secretKey          = $this->_apiSetting->getSecretKey();

        $requestReporting   = array (
            'authorization' => $secretKey,
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $reportingMapper->requestReportingConverter(),

        );

        $processReporting   = \com\checkout\helpers\ApiHttpClient::postRequest($reportingUri, $secretKey, $requestReporting);
        $responseModel      = new ResponseModels\TransactionList($processReporting);

        return $responseModel;
    }


    public function queryChargeback(RequestModels\TransactionFilter $requestModel) {
        $reportingMapper    = new ReportingMapper($requestModel);
        $reportingUri       = $this->_apiUrl->getQueryChargebackApiUri();
        $secretKey          = $this->_apiSetting->getSecretKey();

        $requestReporting   = array (
            'authorization' => $secretKey,
            'mode'          => $this->_apiSetting->getMode(),
            'postedParam'   => $reportingMapper->requestReportingConverter(),

        );

        $processReporting   = \com\checkout\helpers\ApiHttpClient::postRequest($reportingUri, $secretKey, $requestReporting);
        $responseModel      = new ResponseModels\ChargebackList($processReporting);

        return $responseModel;
    }

}