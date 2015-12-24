<?php
/**
 * Created by PhpStorm.
 * Date: 22.12.2015
 * Time: 12:57
 */
namespace com\checkout\ApiServices\Reporting;

class ReportingMapper
{
    private $_requestModel;

    /**
     * @param $requestModel
     */
    public  function __construct($requestModel)
    {
        $this->setRequestModel($requestModel);
    }

    /**
     * @return mixed
     */
    public function getRequestModel()
    {
        return $this->_requestModel;
    }

    /**
     * @param mixed $requestModel
     */
    public function setRequestModel($requestModel)
    {
        $this->_requestModel = $requestModel;
    }

    /**
     * @param null $requestModel
     * @return array|null
     */
    public function requestReportingConverter($requestModel = null )
    {
        $requestReporting = null;
        if(!$requestModel) {
            $requestModel = $this->getRequestModel();
        }

        if($requestModel) {
            $requestReporting = array();

            if(method_exists($requestModel, 'getFromDate') && ($fromDate = $requestModel->getFromDate())) {
                $requestReporting['fromDate'] = $fromDate;
            }

            if(method_exists($requestModel,'getToDate') && ($toDate = $requestModel->getToDate())) {
                $requestReporting['toDate'] = $toDate;
            }

            if(method_exists($requestModel,'getPageSize') && ($pageSize = $requestModel->getPageSize())) {
                $requestReporting['pageSize'] = $pageSize;
            }

            if(method_exists($requestModel,'getPageNumber') && ($pageNumber = $requestModel->getPageNumber())) {
                $requestReporting['pageNumber'] = $pageNumber;
            }

            if(method_exists($requestModel,'getSortColumn') && ($sortColumn = $requestModel->getSortColumn())) {
                $requestReporting['sortColumn'] = $sortColumn;
            }

            if(method_exists($requestModel,'getSortOrder') && ($sortOrder = $requestModel->getSortOrder())) {
                $requestReporting['sortOrder'] = $sortOrder;
            }

            if(method_exists($requestModel,'getSearch') && ($search = $requestModel->getSearch())) {
                $requestReporting['search'] = $search;
            }

            if(method_exists($requestModel,'getFilters') && ($filters = $requestModel->getFilters())) {
                $requestReporting['filters'] = $filters;
            }
        }

        return $requestReporting;
    }

}