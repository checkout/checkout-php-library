<?php
/**
 * Created by PhpStorm.
 * Date: 22.12.2015
 * Time: 12:57
 */
namespace com\checkout\ApiServices\Reporting\RequestModels;

class TransactionFilter
{
    private $_fromDate      = null;
    private $_toDate        = null;
    private $_pageSize      = null;
    private $_pageNumber    = null;
    private $_sortColumn    = null;
    private $_sortOrder     = null;
    private $_search        = null;
    private $_filters       = array();

    /**
     * @param $fromDate
     */
    public function setFromDate($fromDate) {
        $this->_fromDate = $fromDate;
    }

    /**
     * @return null
     */
    public function getFromDate() {
        return $this->_fromDate;
    }

    /**
     * @param $toDate
     */
    public function setToDate($toDate) {
        $this->_toDate = $toDate;
    }

    /**
     * @return null
     */
    public function getToDate() {
        return $this->_toDate;
    }

    /**
     * @param $pageSize
     */
    public function setPageSize($pageSize) {
        $this->_pageSize = $pageSize;
    }

    /**
     * @return null
     */
    public function getPageSize() {
        return $this->_pageSize;
    }

    /**
     * @param $pageNumber
     */
    public function setPageNumber($pageNumber) {
        $this->_pageNumber = $pageNumber;
    }

    /**
     * @return null
     */
    public function getPageNumber() {
        return $this->_pageNumber;
    }

    /**
     * @param $sortColumn
     */
    public function setSortColumn($sortColumn) {
        $this->_sortColumn = $sortColumn;
    }

    /**
     * @return null
     */
    public function getSortColumn() {
        return $this->_sortColumn;
    }

    /**
     * @param $sortOrder
     */
    public function setSortOrder($sortOrder) {
        $this->_sortOrder = $sortOrder;
    }

    /**
     * @return null
     */
    public function getSortOrder() {
        return $this->_sortOrder;
    }

    /**
     * @param $search\
     */
    public function setSearch($search) {
        $this->_search = $search;
    }

    /**
     * @return null
     */
    public function getSearch() {
        return $this->_search;
    }

    /**
     * @param array $filters
     */
    public function setFilters(Array $filters) {
        $this->_filters = $filters;
    }

    /**
     * @return array
     */
    public function getFilters() {
        return $this->_filters;
    }
}