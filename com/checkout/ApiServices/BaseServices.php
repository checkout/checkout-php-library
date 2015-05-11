<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 2:46 PM
 */

namespace com\checkout\ApiServices;


class BaseServices
{
	protected $_apiSetting = null;
	protected $_apiUrl     = null;

	public function __construct(\com\checkout\helpers\AppSetting $apiSetting, \com\checkout\ApiUrls
	$apiUrl = null)
	{

		$this->setApiSetting($apiSetting);
		if(!$this->getApiUrl() && !$apiUrl) {
			$apiUrl =  new \com\checkout\helpers\ApiUrls();
			$apiUrl->setBaseApiUri($apiSetting->getBaseApiUri());
		}
		$this->setApiUrl($apiUrl);
	}

	/**
	 * @return \com\checkout\ApiServices\AppApiSetting
	 */
	public function getApiSetting ()
	{
		return $this->_apiSetting;
	}

	/**
	 * @param \com\checkout\ApiServices\AppApiSetting  $apiSetting
	 */
	public function setApiSetting ( $apiSetting )
	{
		$this->_apiSetting = $apiSetting;
	}

	/**
	 * @return null
	 */
	public function getApiUrl ()
	{
		return $this->_apiUrl;
	}

	/**
	 * @param null $apiUrl
	 */
	public function setApiUrl ( $apiUrl )
	{
		$this->_apiUrl = $apiUrl;
	}
}