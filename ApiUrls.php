<?php

namespace PHPPlugin;


class ApiUrls
{
	private $_baseApiUri                = null;
	private $_cardTokensApiUri          = null;
	private $_paymentTokensApiUri       = null;
	private $_cardProvidersUri          = null;
	private $_localPaymentProvidersUri  = null;
	private $_customersApiUri           = null;
	private $_cardsApiUri               = null;
	private $_cardChargesApiUri         = null;
	private $_cardTokenChargesApiUri    = null;
	private $_defaultCardChargesApiUri  = null;
	private $_chargeRefundsApiUri       = null;
	private $_captureChargesApiUri      = null;
	private $_updateChargesApiUri       = null;
	private $_retrieveChargesApiUri     = null;
	private $_verifyChargesApiUri       = null;
	private $_chargeWithPaymentTokenUri = null;


	public function __construct()
	{

		$this->setBaseApiUri(\PHPPlugin\ApiServices\AppApiSetting::getSingletonInstance()->getBaseApiUri());
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
	public function getVerifyChargesApiUri ()
	{
		if(!$this->_verifyChargesApiUri) {
			$this->setVerifyChargesApiUri($this->getBaseApiUri()."/charges/%s");
		}

		return $this->_verifyChargesApiUri;
	}

	/**
	 * @param null $verifyChargesApiUri
	 */
	public function setVerifyChargesApiUri ( $verifyChargesApiUri )
	{
		$this->_verifyChargesApiUri = $verifyChargesApiUri;
	}

	/**
	 * @return null
	 */
	public function getCardTokensApiUri ()
	{
		if(!$this->_cardTokensApiUri) {
			$this->setCardTokensApiUri($this->getBaseApiUri()."/tokens/card");
		}
		return $this->_cardTokensApiUri;
	}

	/**
	 * @param null $cardTokensApiUri
	 */
	public function setCardTokensApiUri ( $cardTokensApiUri )
	{
		$this->_cardTokensApiUri = $cardTokensApiUri;
	}

	/**
	 * @return null
	 */
	public function getPaymentTokensApiUri ()
	{
		if(!$this->_paymentTokensApiUri) {
			$this->setPaymentTokensApiUri($this->getBaseApiUri()."/tokens/payment");
		}
		return $this->_paymentTokensApiUri;
	}

	/**
	 * @param null $paymentTokensApiUri
	 */
	public function setPaymentTokensApiUri ( $paymentTokensApiUri )
	{
		$this->_paymentTokensApiUri = $paymentTokensApiUri;
	}

	/**
	 * @return null
	 */
	public function getCardProvidersUri ()
	{
		if(!$this->_cardProvidersUri) {
			$this->setCardProvidersUri($this->getBaseApiUri()."/providers/cards");
		}
		return $this->_cardProvidersUri;
	}

	/**
	 * @param null $cardProvidersUri
	 */
	public function setCardProvidersUri ( $cardProvidersUri )
	{
		$this->_cardProvidersUri = $cardProvidersUri;
	}

	/**
	 * @return null
	 */
	public function getLocalPaymentProvidersUri ()
	{
		if(!$this->_localPaymentProvidersUri) {
			$this->setLocalPaymentProvidersUri($this->getBaseApiUri()."/providers/localpayments");
		}

		return $this->_localPaymentProvidersUri;
	}

	/**
	 * @param null $localPaymentProvidersUri
	 */
	public function setLocalPaymentProvidersUri ( $localPaymentProvidersUri )
	{
		$this->_localPaymentProvidersUri = $localPaymentProvidersUri;
	}

	/**
	 * @return null
	 */
	public function getCustomersApiUri ()
	{
		if(!$this->_customersApiUri) {
			$this->setCustomersApiUri($this->getBaseApiUri()."/customers");
		}

		return $this->_customersApiUri;
	}

	/**
	 * @param null $customersApiUri
	 */
	public function setCustomersApiUri ( $customersApiUri )
	{
		$this->_customersApiUri = $customersApiUri;
	}

	/**
	 * @return null
	 */
	public function getCardsApiUri ()
	{
		if(!$this->_cardsApiUri) {
			$this->setCardsApiUri($this->getBaseApiUri()."/customers/%s/cards");
		}
		return $this->_cardsApiUri;
	}

	/**
	 * @param null $cardsApiUri
	 */
	public function setCardsApiUri ( $cardsApiUri )
	{
		$this->_cardsApiUri = $cardsApiUri;
	}

	/**
	 * @return null
	 */
	public function getCardChargesApiUri ()
	{
		if(!$this->_cardChargesApiUri) {
			$this->setCardChargesApiUri($this->getBaseApiUri()."/charges/card");
		}
		return $this->_cardChargesApiUri;
	}

	/**
	 * @param null $cardChargesApiUri
	 */
	public function setCardChargesApiUri ( $cardChargesApiUri )
	{
		$this->_cardChargesApiUri = $cardChargesApiUri;
	}

	/**
	 * @return null
	 */
	public function getCardTokenChargesApiUri ()
	{
		if(!$this->_cardTokenChargesApiUri) {
			$this->setCardTokenChargesApiUri($this->getBaseApiUri()."/charges/token");
		}
		return $this->_cardTokenChargesApiUri;
	}

	/**
	 * @param null $cardTokenChargesApiUri
	 */
	public function setCardTokenChargesApiUri ( $cardTokenChargesApiUri )
	{
		$this->_cardTokenChargesApiUri = $cardTokenChargesApiUri;
	}


	/**
	 * @return String|null
	 */
	public function getChargeWithPaymentTokenUri ()
	{
		if(!$this->_chargeWithPaymentTokenUri) {
			$this->setChargeWithPaymentTokenUri($this->getBaseApiUri()."/charges/js/card");
		}

		return $this->_chargeWithPaymentTokenUri;
	}

	/**
	 * @param null $chargeWithPaymentTokenUri
	 */
	public function setChargeWithPaymentTokenUri ( $chargeWithPaymentTokenUri )
	{
		$this->_chargeWithPaymentTokenUri = $chargeWithPaymentTokenUri;
	}

	/**
	 * @return null
	 */
	public function getDefaultCardChargesApiUri ()
	{
		if(!$this->_defaultCardChargesApiUri) {
			$this->setDefaultCardChargesApiUri($this->getBaseApiUri()."/charges/customer");
		}
		return $this->_defaultCardChargesApiUri;
	}

	/**
	 * @param null $defaultCardChargesApiUri
	 */
	public function setDefaultCardChargesApiUri ( $defaultCardChargesApiUri )
	{
		$this->_defaultCardChargesApiUri = $defaultCardChargesApiUri;
	}

	/**
	 * @return null
	 */
	public function getChargeRefundsApiUri ()
	{
		if(!$this->_chargeRefundsApiUri) {
			$this->setChargeRefundsApiUri($this->getBaseApiUri()."/charges/%s/refund");
		}
		return $this->_chargeRefundsApiUri;
	}

	/**
	 * @param null $chargeRefundsApiUri
	 */
	public function setChargeRefundsApiUri ( $chargeRefundsApiUri )
	{
		$this->_chargeRefundsApiUri = $chargeRefundsApiUri;
	}

	/**
	 * @return null
	 */
	public function getCaptureChargesApiUri ()
	{
		if(!$this->_captureChargesApiUri) {
			$this->setCaptureChargesApiUri($this->getBaseApiUri()."/charges/%s/capture");
		}
		return $this->_captureChargesApiUri;
	}

	/**
	 * @param null $captureChargesApiUri
	 */
	public function setCaptureChargesApiUri ( $captureChargesApiUri )
	{
		$this->_captureChargesApiUri = $captureChargesApiUri;
	}

	/**
	 * @return null
	 */
	public function getUpdateChargesApiUri ()
	{
		if(!$this->_updateChargesApiUri) {
			$this->setCaptureChargesApiUri($this->getBaseApiUri()."/charges/%s");
		}
		return $this->_updateChargesApiUri;
	}

	/**
	 * @return null
	 */
	public function getRetrieveChargesApiUri ()
	{

		if(!$this->_retrieveChargesApiUri) {
			$this->setRetrieveChargesApiUri($this->getBaseApiUri()."/charges/%s");
		}

		return $this->_retrieveChargesApiUri;
	}

	/**
	 * @param null $retrieveChargesApiUri
	 */
	public function setRetrieveChargesApiUri ( $retrieveChargesApiUri )
	{
		$this->_retrieveChargesApiUri = $retrieveChargesApiUri;
	}

	/**
	 * @param null $updateChargesApiUri
	 */
	public function setUpdateChargesApiUri ( $updateChargesApiUri )
	{
		$this->_updateChargesApiUri = $updateChargesApiUri;
	}

}