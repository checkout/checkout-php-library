<?php
namespace com\checkout\helpers;

final class ApiHttpClientCustomException extends \Exception
{
    private $errorMessage = '';
    private $errorCode = '';
    private $eventId = '';


    function __construct($errorMessage, $errorCode, $eventId) {

    			$this->errorMessage = $errorMessage;
    			$this->errorCode = $errorCode;
                $this->eventId = $eventId;
        }


    function getErrorMessage() {
            return $this->errorMessage;
    }

    function getErrorCode() {
            return $this->errorCode;
    }

    function getEventId() {
            return $this->eventId;
    }
	
}
