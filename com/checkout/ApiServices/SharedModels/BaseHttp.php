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
    protected  $_hasError;

    public function __construct($response = null)
    {
        if($response) {
            $this->_setHttpStatus($response->getHttpStatus());
            $this->_setHasError($response->hasError()?true:false);
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
     * @return mixed
     */
    public function hasError()
    {
        return $this->_hasError;
    }
    /**
     * @param mixed $httpStatus
     */
    private function _setHttpStatus($httpStatus)
    {
        $this->_httpStatus = $httpStatus;
    }

    private function _setHasError($hasError)
    {
        $this->_hasError = $hasError;
    }
}
