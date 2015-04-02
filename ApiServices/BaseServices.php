<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/17/2015
 * Time: 2:46 PM
 */

namespace PHPPlugin\ApiServices;


class BaseServices
{
	protected $_apiSetting = null;
	protected $_apiUrl     = null;

	public function __construct(\PHPPlugin\ApiServices\AppApiSetting $apiSetting, \PHPPlugin\ApiUrls
	$apiUrl = null)
	{
		$this->setApiSetting($apiSetting);
		if(!$this->getApiUrl() && !$apiUrl) {
			$apiUrl =  new \PHPPlugin\ApiUrls();
		}
		$this->setApiUrl($apiUrl);
	}

	/**
	 * @return \PHPPlugin\ApiServices\AppApiSetting
	 */
	public function getApiSetting ()
	{
		return $this->_apiSetting;
	}

	/**
	 * @param \PHPPlugin\ApiServices\AppApiSetting  $apiSetting
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