<?php

namespace com\checkout\helpers;

class ApiUrls
{
    private $_baseApiUri = null;
    private $_cardTokensApiUri = null;
    private $_paymentTokensApiUri = null;
    private $_paymentTokenUpdateApiUri = null;
    private $_cardProvidersUri = null;
    private $_localPaymentProvidersUri = null;
    private $_customersApiUri = null;
    private $_payoutsApiUri = null;
    private $_cardsApiUri = null;
    private $_cardChargesApiUri = null;
    private $_cardTokenChargesApiUri = null;
    private $_defaultCardChargesApiUri = null;
    private $_chargeRefundsApiUri = null;
    private $_captureChargesApiUri = null;
    private $_updateChargesApiUri = null;
    private $_retrieveChargesApiUri = null;
    private $_retrieveChargeHistoryApiUri = null;
    private $_verifyChargesApiUri = null;
    private $_chargeWithPaymentTokenUri = null;
    private $_voidChargesApiUri = null;
    private $_queryTransactionApiUri = null;
    private $_queryChargebackApiUri = null;
    private $_recurringPaymentsApiUri = null;
    private $_recurringPaymentsQueryApiUri = null;
    private $_recurringPaymentsCustomersApiUri = null;
    private $_recurringPaymentsCustomersQueryApiUri = null;
    private $_visaCheckoutCardTokenApiUri = null;

    public function __construct()
    {
        $this->setBaseApiUri(AppSetting::getSingletonInstance()->getBaseApiUri());
    }

    /**
     * get the base api url
     * @return string
     */
    public function getBaseApiUri()
    {
        return $this->_baseApiUri;
    }

    /**
     * set the base api url
     * @param string $baseApiUri
     */
    public function setBaseApiUri($baseApiUri)
    {
        $this->_baseApiUri = $baseApiUri;
    }

    /**
     * return url to verify a charge
     * @return string
     */
    public function getVerifyChargesApiUri()
    {
        if (!$this->_verifyChargesApiUri) {
            $this->setVerifyChargesApiUri($this->getBaseApiUri() . "/charges/%s");
        }

        return $this->_verifyChargesApiUri;
    }

    /**
     * set the url for verify a charge
     * @param string $verifyChargesApiUri
     */
    public function setVerifyChargesApiUri($verifyChargesApiUri)
    {
        $this->_verifyChargesApiUri = $verifyChargesApiUri;
    }

    /**
     * return card token url
     * @return string
     */
    public function getCardTokensApiUri()
    {
        if (!$this->_cardTokensApiUri) {
            $this->setCardTokensApiUri($this->getBaseApiUri() . "/charges/token");
        }
        return $this->_cardTokensApiUri;
    }

    /**
     * set card token url
     * @param string $cardTokensApiUri
     */
    public function setCardTokensApiUri($cardTokensApiUri)
    {
        $this->_cardTokensApiUri = $cardTokensApiUri;
    }

    /**
     * set payment token url
     * @return string
     */
    public function getPaymentTokensApiUri()
    {
        if (!$this->_paymentTokensApiUri) {
            $this->setPaymentTokensApiUri($this->getBaseApiUri() . "/tokens/payment");
        }
        return $this->_paymentTokensApiUri;
    }

    /**
     * set payment token url
     * @param string $paymentTokensApiUri
     */
    public function setPaymentTokensApiUri($paymentTokensApiUri)
    {
        $this->_paymentTokensApiUri = $paymentTokensApiUri;
    }

    /**
     * set payment token update url
     * @return string
     */
    public function getPaymentTokenUpdateApiUri()
    {
        if (!$this->_paymentTokenUpdateApiUri) {
            $this->setPaymentTokenUpdateApiUri($this->getBaseApiUri() . "/tokens/payment/%s");
        }
        return $this->_paymentTokenUpdateApiUri;
    }

    /**
     * set payment token update url
     * @param string $paymentTokenUpdateApiUri
     */
    public function setPaymentTokenUpdateApiUri($paymentTokenUpdateApiUri)
    {
        $this->_paymentTokenUpdateApiUri = $paymentTokenUpdateApiUri;
    }

    /**
     * return payment token url
     * @return string
     */
    public function getCardProvidersUri()
    {
        if (!$this->_cardProvidersUri) {
            $this->setCardProvidersUri($this->getBaseApiUri() . "/providers/cards");
        }
        return $this->_cardProvidersUri;
    }

    /**
     * set payment token url
     * @param string $cardProvidersUri
     */
    public function setCardProvidersUri($cardProvidersUri)
    {
        $this->_cardProvidersUri = $cardProvidersUri;
    }

    /**
     * set local payment url
     * @return string
     */
    public function getLocalPaymentProvidersUri()
    {
        if (!$this->_localPaymentProvidersUri) {
            $this->setLocalPaymentProvidersUri($this->getBaseApiUri() . "/providers/localpayments");
        }

        return $this->_localPaymentProvidersUri;
    }

    /**
     * set local payment url
     * @param string $localPaymentProvidersUri
     */
    public function setLocalPaymentProvidersUri($localPaymentProvidersUri)
    {
        $this->_localPaymentProvidersUri = $localPaymentProvidersUri;
    }

    /**
     * return customer url
     * @return string
     */
    public function getCustomersApiUri()
    {
        if (!$this->_customersApiUri) {
            $this->setCustomersApiUri($this->getBaseApiUri() . "/customers");
        }

        return $this->_customersApiUri;
    }

    /**
     * set customer url
     * @param string $customersApiUri
     */
    public function setCustomersApiUri($customersApiUri)
    {
        $this->_customersApiUri = $customersApiUri;
    }
    
    /**
     * return payouts url
     * @return string
     */
    public function getPayoutsApiUri()
    {
        if (!$this->_payoutsApiUri) {
            $this->setPayoutsApiUri($this->getBaseApiUri() . "/payouts");
        }

        return $this->_payoutsApiUri;
    }

    /**
     * set payout url
     * @param string $payoutsApiUri
     */
    public function setPayoutsApiUri($payoutsApiUri)
    {
        $this->_payoutsApiUri = $payoutsApiUri;
    }

    /**
     * get card url
     * @return string
     */
    public function getCardsApiUri()
    {
        if (!$this->_cardsApiUri) {
            $this->setCardsApiUri($this->getBaseApiUri() . "/customers/%s/cards");
        }
        return $this->_cardsApiUri;
    }

    /**
     * set card url
     * @param string $cardsApiUri
     */
    public function setCardsApiUri($cardsApiUri)
    {
        $this->_cardsApiUri = $cardsApiUri;
    }

    /**
     * get card charge url
     * @return string
     */
    public function getCardChargesApiUri()
    {
        if (!$this->_cardChargesApiUri) {
            $this->setCardChargesApiUri($this->getBaseApiUri() . "/charges/card");
        }
        return $this->_cardChargesApiUri;
    }

    /**
     * set cart charge url
     * @param string $cardChargesApiUri
     */
    public function setCardChargesApiUri($cardChargesApiUri)
    {
        $this->_cardChargesApiUri = $cardChargesApiUri;
    }

    /**
     * get card token charge url
     * @return string
     */
    public function getCardTokenChargesApiUri()
    {
        if (!$this->_cardTokenChargesApiUri) {
            $this->setCardTokenChargesApiUri($this->getBaseApiUri() . "/charges/token");
        }
        return $this->_cardTokenChargesApiUri;
    }

    /**
     * set card token charge url
     * @param string $cardTokenChargesApiUri
     */
    public function setCardTokenChargesApiUri($cardTokenChargesApiUri)
    {
        $this->_cardTokenChargesApiUri = $cardTokenChargesApiUri;
    }

    /**
     * get the charge payment token url
     * @return string
     */
    public function getChargeWithPaymentTokenUri()
    {
        if (!$this->_chargeWithPaymentTokenUri) {
            $this->setChargeWithPaymentTokenUri($this->getBaseApiUri() . "/charges/js/card");
        }

        return $this->_chargeWithPaymentTokenUri;
    }

    /**
     * set the charge payment token url
     * @param string $chargeWithPaymentTokenUri
     */
    public function setChargeWithPaymentTokenUri($chargeWithPaymentTokenUri)
    {
        $this->_chargeWithPaymentTokenUri = $chargeWithPaymentTokenUri;
    }

    /**
     * @return string
     */
    public function getDefaultCardChargesApiUri()
    {
        if (!$this->_defaultCardChargesApiUri) {
            $this->setDefaultCardChargesApiUri($this->getBaseApiUri() . "/charges/customer");
        }
        return $this->_defaultCardChargesApiUri;
    }

    /**
     * @param string $defaultCardChargesApiUri
     */
    public function setDefaultCardChargesApiUri($defaultCardChargesApiUri)
    {
        $this->_defaultCardChargesApiUri = $defaultCardChargesApiUri;
    }

    /**
     * @return string
     */
    public function getChargeRefundsApiUri()
    {
        if (!$this->_chargeRefundsApiUri) {
            $this->setChargeRefundsApiUri($this->getBaseApiUri() . "/charges/%s/refund");
        }
        return $this->_chargeRefundsApiUri;
    }

    /**
     * @param string $chargeRefundsApiUri
     */
    public function setChargeRefundsApiUri($chargeRefundsApiUri)
    {
        $this->_chargeRefundsApiUri = $chargeRefundsApiUri;
    }

    /**
     * @return string
     */
    public function getCaptureChargesApiUri()
    {
        if (!$this->_captureChargesApiUri) {
            $this->setCaptureChargesApiUri($this->getBaseApiUri() . "/charges/%s/capture");
        }
        return $this->_captureChargesApiUri;
    }

    /**
     * @param string $captureChargesApiUri
     */
    public function setCaptureChargesApiUri($captureChargesApiUri)
    {
        $this->_captureChargesApiUri = $captureChargesApiUri;
    }

    /**
     * @return string
     */
    public function getUpdateChargesApiUri()
    {
        if (!$this->_updateChargesApiUri) {
            $this->setUpdateChargesApiUri($this->getBaseApiUri() . "/charges/%s");
        }
        return $this->_updateChargesApiUri;
    }

    /**
     * @return null
     */
    public function getVoidChargesApiUri()
    {
        if (!$this->_voidChargesApiUri) {
            $this->setVoidChargesApiUri($this->getBaseApiUri() . "/charges/%s/void");
        }
        return $this->_voidChargesApiUri;
    }

    /**
     * @return null
     */
    public function getQueryTransactionApiUri()
    {
        if (!$this->_queryTransactionApiUri) {
            $this->setQueryTransactionApiUri($this->getBaseApiUri() . "/reporting/transactions");
        }

        return $this->_queryTransactionApiUri;
    }

    /**
     * @param $queryTransactionApiUri
     */
    public function setQueryTransactionApiUri($queryTransactionApiUri)
    {
        $this->_queryTransactionApiUri = $queryTransactionApiUri;
    }

    /**
     * @return null
     */
    public function getQueryChargebackApiUri()
    {
        if (!$this->_queryChargebackApiUri) {
            $this->setQueryChargebackApiUri($this->getBaseApiUri() . "/reporting/chargebacks");
        }

        return $this->_queryChargebackApiUri;
    }

    /**
     * @param $queryChargebackApiUri
     */
    public function setQueryChargebackApiUri($queryChargebackApiUri)
    {
        $this->_queryChargebackApiUri = $queryChargebackApiUri;
    }

    /**
     * @param null $voidChargesApiUri
     */
    public function setVoidChargesApiUri($voidChargesApiUri)
    {
        $this->_voidChargesApiUri = $voidChargesApiUri;
    }

    /**
     * @return string
     */
    public function getRetrieveChargesApiUri()
    {

        if (!$this->_retrieveChargesApiUri) {
            $this->setRetrieveChargesApiUri($this->getBaseApiUri() . "/charges/%s");
        }

        return $this->_retrieveChargesApiUri;
    }

    /**
     * @param string $retrieveChargesApiUri
     */
    public function setRetrieveChargesApiUri($retrieveChargesApiUri)
    {
        $this->_retrieveChargesApiUri = $retrieveChargesApiUri;
    }

    /**
     * @return string
     */
    public function getRetrieveChargeHistoryApiUri()
    {

        if (!$this->_retrieveChargeHistoryApiUri) {
            $this->setRetrieveChargeHistoryApiUri($this->getBaseApiUri() . "/charges/%s/history");
        }

        return $this->_retrieveChargeHistoryApiUri;
    }

    /**
     * @param string $retrieveChargeHistoryApiUri
     */
    public function setRetrieveChargeHistoryApiUri($retrieveChargeHistoryApiUri)
    {
        $this->_retrieveChargeHistoryApiUri = $retrieveChargeHistoryApiUri;
    }

    /**
     * @param string $updateChargesApiUri
     */
    public function setUpdateChargesApiUri($updateChargesApiUri)
    {
        $this->_updateChargesApiUri = $updateChargesApiUri;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentsApiUri()
    {

        if (!$this->_recurringPaymentsApiUri) {
            $this->setRecurringPaymentsApiUri($this->getBaseApiUri() . "/recurringPayments/plans");
        }

        return $this->_recurringPaymentsApiUri;
    }

    /**
     * @param string $recurringPaymentsApiUri
     */
    public function setRecurringPaymentsApiUri($recurringPaymentsApiUri)
    {
        $this->_recurringPaymentsApiUri = $recurringPaymentsApiUri;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentsQueryApiUri()
    {

        if (!$this->_recurringPaymentsQueryApiUri) {
            $this->setRecurringPaymentsQueryApiUri($this->getBaseApiUri() . "/recurringPayments/plans/search");
        }

        return $this->_recurringPaymentsQueryApiUri;
    }

    /**
     * @param string $recurringPaymentsQueryApiUri
     */
    public function setRecurringPaymentsQueryApiUri($recurringPaymentsQueryApiUri)
    {
        $this->_recurringPaymentsQueryApiUri = $recurringPaymentsQueryApiUri;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentsCustomersApiUri()
    {

        if (!$this->_recurringPaymentsCustomersApiUri) {
            $this->setRecurringPaymentsCustomersApiUri($this->getBaseApiUri() . "/recurringPayments/customers");
        }

        return $this->_recurringPaymentsCustomersApiUri;
    }

    /**
     * @param string $recurringPaymentsCustomersApiUri
     */
    public function setRecurringPaymentsCustomersApiUri($recurringPaymentsCustomersApiUri)
    {
        $this->_recurringPaymentsCustomersApiUri = $recurringPaymentsCustomersApiUri;
    }

    /**
     * @return string
     */
    public function getRecurringPaymentsCustomersQueryApiUri()
    {

        if (!$this->_recurringPaymentsCustomersQueryApiUri) {
            $this->setRecurringPaymentsCustomersQueryApiUri($this->getBaseApiUri() . "/recurringPayments/customers/search");
        }

        return $this->_recurringPaymentsCustomersQueryApiUri;
    }

    /**
     * @param string $recurringPaymentsCustomersQueryApiUri
     */
    public function setRecurringPaymentsCustomersQueryApiUri($recurringPaymentsCustomersQueryApiUri)
    {
        $this->_recurringPaymentsCustomersQueryApiUri = $recurringPaymentsCustomersQueryApiUri;
    }

    /**
     * @return string
     */
    public function getVisaCheckoutCardTokenApiUri()
    {
        if (!$this->_visaCheckoutCardTokenApiUri) {
            $this->setVisaCheckoutCardTokenApiUri($this->getBaseApiUri() . "/tokens/card/visa-checkout");
        }

        return $this->_visaCheckoutCardTokenApiUri;
    }

    /**
     * @param string $visaCheckoutCardTokenApiUri
     */
    public function setVisaCheckoutCardTokenApiUri($visaCheckoutCardTokenApiUri)
    {
        $this->_visaCheckoutCardTokenApiUri = $visaCheckoutCardTokenApiUri;
    }
}
