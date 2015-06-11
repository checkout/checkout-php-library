<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 11/06/2015
 * Time: 08:42
 */

namespace com\checkout\ApiServices\SharedModels;


class BaseHttp
{
    protected  $_httpStatus;

    public function __construct($response = null)
    {
        if($response) {
            $this->_setHttpStatus($response->getHttpStatus());
        }
    }
    /**
     * @return mixed
     */
    public function getHttpStatus()
    {
        return $this->_httpStatus;
    }

    /**
     * @param mixed $httpStatus
     */
    private function _setHttpStatus($httpStatus)
    {
        $this->_httpStatus = $httpStatus;
    }
} 