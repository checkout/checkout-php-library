<?php
namespace com\checkout\helpers
{

	class AppSetting
	{
		protected static $_instance = null;
		private $_secretKey = null;
		private $_requestTimeOut = 60;
		private $_debugMode = false;
		private $_clientVersion = 1.0;
		private $_defaultContentType = 'JSON';
		private $_readTimeout = '60';
		private $_mode = 'sandbox';
		private  $_baseApiUri = "https://sandbox.checkout.com/v2/";



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
            if(isset($_SERVER) && isset($_SERVER['HTTP_USER_AGENT'])) {
                $this->setClientUserAgentName($_SERVER['HTTP_USER_AGENT']);
            }
		}
		/**
		 * Create/return original instance
		 * @return self
		 */
		public static function getSingletonInstance()
		{
			if (!isset(static::$_instance)) {
				static::$_instance = new AppSetting();
			}
			return static::$_instance;
		}

        /**
         * @param bool $override
         * @return AppSetting
         */
		public static function getInstance($override = false)
		{
			$instance = new  AppSetting();
			if ($override) {
				static::$_instance = $instance;
			}
			return $instance;
		}

		/**
		 * @return null
		 */
		public function getSecretKey ()
		{
			return $this->_secretKey;
		}

		/**
		 * @param null $secretKey
		 */
		public function setSecretKey ( $secretKey )
		{
			$this->_secretKey = $secretKey;
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
		 * @return string
		 */
		public function getReadTimeout ()
		{
			return $this->_readTimeout;
		}

		/**
		 * @param string $readTimeout
		 */
		public function setReadTimeout ( $readTimeout )
		{
			$this->_readTimeout = $readTimeout;
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

			if($this->_mode == 'sandbox') {

				$this->_baseApiUri = "https://sandbox.checkout.com/api2/v2";
			}else {

				$this->_baseApiUri =  'https://api2.checkout.com/v2';
			}

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