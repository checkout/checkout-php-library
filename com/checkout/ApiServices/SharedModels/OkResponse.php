<?php
namespace com\checkout\ApiServices\SharedModels;


class OkResponse extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
    public function __construct($response)
    {
        parent::__construct($response);
        $this->setMessage($response->getMessage());
    }
	protected $_message;

	/**
	 * @return mixed
	 */
	public function getMessage ()
	{
		return $this->_message;
	}

	/**
	 * @param mixed $message
	 */
	public function setMessage ( $message )
	{
		$this->_message = $message;
	}
}