<?php
namespace PHPPlugin\ApiServices
{

	class AppApiSetting
	{
		protected static $_instance = null;
		private $_privateKey = null;
		private $_publicKey = null;
		private $_requestTimeOut = 60;
		private $_debugMode = true;
		private $_baseApiUri = null;
		private $_clientVersion = 1.0;
		private $_clientUserAgentName = '';
		private $_defaultContentType = 'JSON';
		private $_mode = 'preprod';

		/**
		 * @return string
		 */
		public function getMode ()
		{
			return $this->_mode;
		}

		/**
		 * @param string $mode
		 */
		public function setMode ( $mode )
		{
			$this->_mode = $mode;
		}


		protected function __construct()
		{
			$this->setClientUserAgentName($_SERVER['HTTP_USER_AGENT']);
		}
		/**
		 * Create/return orignal instance
		 * @return self
		 */
		public static function getSingletonInstance()
		{
			if (!isset(static::$_instance)) {
				static::$_instance = new AppApiSetting();
			}
			return static::$_instance;
		}

		/**
		 * Create a new instance of AppApiSetting
		 * @param bolean $overide overide previous instance
		 * @return self
		 */
		public static function getInstance($overide = false)
		{
			$instance = new  AppApiSetting();
			if ($overide) {
				static::$_instance = $instance;
			}
			return $instance;
		}

		/**
		 * @return null
		 */
		public function getPrivateKey ()
		{
			return $this->_privateKey;
		}

		/**
		 * @param null $privateKey
		 */
		public function setPrivateKey ( $privateKey )
		{
			$this->_privateKey = $privateKey;
		}

		/**
		 * @return null
		 */
		public function getPublicKey ()
		{
			return $this->_publicKey;
		}

		/**
		 * @param null $publicKey
		 */
		public function setPublicKey ( $publicKey )
		{
			$this->_publicKey = $publicKey;
		}

		/**
		 * @return null
		 */
		public function getRequestTimeOut ()
		{
			return $this->_requestTimeOut;
		}

		/**
		 * @param null $requestTimeOut
		 */
		public function setRequestTimeOut ( $requestTimeOut )
		{
			$this->_requestTimeOut = $requestTimeOut;
		}

		/**
		 * @return null
		 */
		public function getDebugMode ()
		{
			return $this->_debugMode;
		}

		/**
		 * @param null $debugMode
		 */
		public function setDebugMode ( $debugMode )
		{
			$this->_debugMode = $debugMode;
		}

		/**
		 * @return null
		 */
		public function getBaseApiUri ()
		{
			return $this->_baseApiUri;
		}

		/**
		 * @param null $baseApiUri
		 */
		public function setBaseApiUri ( $baseApiUri )
		{
			$this->_baseApiUri = $baseApiUri;
		}

		/**
		 * @return null
		 */
		public function getClientVersion ()
		{
			return $this->_clientVersion;
		}

		/**
		 * @param null $clientVersion
		 */
		public function setClientVersion ( $clientVersion )
		{
			$this->_clientVersion = $clientVersion;
		}

		/**
		 * @return null
		 */
		public function getClientUserAgentName ()
		{
			return $this->_clientUserAgentName;
		}

		/**
		 * @param null $clientUserAgentName
		 */
		public function setClientUserAgentName ( $clientUserAgentName )
		{
			$this->_clientUserAgentName = $clientUserAgentName;
		}

		/**
		 * @return null
		 */
		public function getDefaultContentType ()
		{
			return $this->_defaultContentType;
		}

		/**
		 * @param null $defaultContentType
		 */
		public function setDefaultContentType ( $defaultContentType )
		{
			$this->_defaultContentType = $defaultContentType;
		}

	}
}