<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 7:47 AM
 */

namespace com\checkout\ApiServices\Customers\ResponseModels;


class Customer extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_object;
	private $_id;
	private $_name;
    private $_customerName;
	private $_created;
	private $_email;
	private $_phoneNumber;
	private $_description;
	private $_ltv;
	private $_defaultCard;
	private $_responseCode;
	private $_liveMode;
	private $_cards;
	private $_metadata;

	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setObject ( $response->getObject() );
		$this->_setCards ( $response->getCards() );
		$this->_setCreated ( $response->getCreated() );
		$this->_setDefaultCard ( $response->getdDefaultCard() );
		$this->_setDescription ( $response->getdDescription() );
		$this->_setEmail ( $response->getEmail() );
		$this->_setId ( $response->getId() );
		$this->_setLiveMode ( $response->getLiveMode() );
		$this->_setLtv ( $response->getLtv() );
		$this->_setMetadata ( $response->getMetadata() );
		$this->_setName ( $response->getName() );
		$this->_setPhoneNumber ( $response->getPhoneNumber() );
		$this->_setResponseCode ( $response->getResponseCode() );
        $this->_setCustomerName( $response->getCustomerName() );
	}

	/**
	 * @return mixed
	 */
	public function getCards ()
	{
		return $this->_cards;
	}

	private function getCard ( $card )
	{

		$cardObg = new \com\checkout\ApiServices\Cards\ResponseModels\CardList($card);
		return $cardObg;
	}
	/**
	 * @return mixed
	 */
	public function getCreated ()
	{
		return $this->_created;
	}

	/**
	 * @return mixed
	 */
	public function getDefaultCard ()
	{
		return $this->_defaultCard;
	}

	/**
	 * @return mixed
	 */
	public function getDescription ()
	{
		return $this->_description;
	}

	/**
	 * @return mixed
	 */
	public function getEmail ()
	{
		return $this->_email;
	}
    
    /**
	 * @return mixed
	 */
	public function getCustomerName ()
	{
		return $this->_customerName;
	}

	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @return mixed
	 */
	public function getLiveMode ()
	{
		return $this->_liveMode;
	}

	/**
	 * @return mixed
	 */
	public function getLtv ()
	{
		return $this->_ltv;
	}

	/**
	 * @return mixed
	 */
	public function getMetadata ()
	{
		return $this->_metadata;
	}

	/**
	 * @return mixed
	 */
	public function getName ()
	{
		return $this->_name;
	}

	/**
	 * @return mixed
	 */
	public function getObject ()
	{
		return $this->_object;
	}

	/**
	 * @return mixed
	 */
	public function getPhoneNumber ()
	{
		return $this->_phoneNumber;
	}

	/**
	 * @return mixed
	 */
	public function getResponseCode ()
	{
		return $this->_responseCode;
	}

	/**
	 * @param mixed $object
	 */
	private function _setObject ( $object )
	{
		$this->_object = $object;
	}


	/**
	 * @param mixed $cards
	 */
	private function _setCards ( $cards )
	{

        if($cards) {
            $cardsArray = $cards->toArray();
            $this->_cards = $this->getCard($cards);
        }

	}
	/**
	 * @param mixed $created
	 */
	private function _setCreated ( $created )
	{
		$this->_created = $created;
	}

	/**
    * @param mixed $defaultCard
    */
	private function _setDefaultCard ( $defaultCard )
	{
		$this->_defaultCard = $defaultCard;
	}

	/**
    * @param mixed $description
    */
	private function _setDescription ( $description )
	{
		$this->_description = $description;
	}

	/**
    * @param mixed $email
    */
	private function _setEmail ( $email )
	{
		$this->_email = $email;
	}
    
    /**
    * @param mixed $customerName
    */
	private function _setCustomerName ( $customerName )
	{
		$this->_customerName = $customerName;
	}

	/**
    * @param mixed $id
    */
	private function _setId ( $id )
	{
		$this->_id = $id;
	}/**
 * @param mixed $liveMode
 */
	private function _setLiveMode ( $liveMode )
	{
		$this->_liveMode = $liveMode;
	}

	/**
    * @param mixed $ltv
    */
	private function _setLtv ( $ltv )
	{
		$this->_ltv = $ltv;
	}

	/**
    * @param mixed $metadata
    */
	private function _setMetadata ( $metadata )
	{
        if($metadata) {
            $this->_metadata = $metadata->toArray();
        }
	}

	/**
    * @param mixed $name
    */
	private function _setName ( $name )
	{
		$this->_name = $name;
	}

	/**
    * @param mixed $phoneNumber
    */

	private function _setPhoneNumber ( $phoneNumber )
	{
		$this->_phoneNumber = $phoneNumber;
	}

	/**
    * @param mixed $responseCode
    */
	private function _setResponseCode ( $responseCode )
	{
		$this->_responseCode = $responseCode;
	}

}