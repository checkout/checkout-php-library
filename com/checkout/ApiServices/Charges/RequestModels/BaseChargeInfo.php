<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 5/12/2015
 * Time: 8:41 AM
 */

namespace com\checkout\ApiServices\Charges\RequestModels;


class BaseChargeInfo extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	protected $_description;
	protected $_trackId;
	protected $_udf1;
	protected $_udf2;
	protected $_udf3;
	protected $_udf4;
	protected $_udf5;
	protected $_metadata = array();
	protected $_descriptor;

	/**
	 * @return mixed
	 */
	public function getDescription ()
	{
		return $this->_description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription ( $description )
	{
		$this->_description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getTrackId ()
	{
		return $this->_trackId;
	}

	/**
	 * @param mixed $trackId
	 */
	public function setTrackId ( $trackId )
	{
		$this->_trackId = $trackId;
	}

	/**
	 * @return mixed
	 */
	public function getUdf1 ()
	{
		return $this->_udf1;
	}

	/**
	 * @param mixed $udf1
	 */
	public function setUdf1 ( $udf1 )
	{
		$this->_udf1 = $udf1;
	}

	/**
	 * @return mixed
	 */
	public function getUdf2 ()
	{
		return $this->_udf2;
	}

	/**
	 * @param mixed $udf2
	 */
	public function setUdf2 ( $udf2 )
	{
		$this->_udf2 = $udf2;
	}

	/**
	 * @return mixed
	 */
	public function getUdf3 ()
	{
		return $this->_udf3;
	}

	/**
	 * @param mixed $udf3
	 */
	public function setUdf3 ( $udf3 )
	{
		$this->_udf3 = $udf3;
	}

	/**
	 * @return mixed
	 */
	public function getUdf4 ()
	{
		return $this->_udf4;
	}

	/**
	 * @param mixed $udf4
	 */
	public function setUdf4 ( $udf4 )
	{
		$this->_udf4 = $udf4;
	}

	/**
	 * @return mixed
	 */
	public function getUdf5 ()
	{
		return $this->_udf5;
	}

	/**
	 * @param mixed $udf5
	 */
	public function setUdf5 ( $udf5 )
	{
		$this->_udf5 = $udf5;
	}

	/**
	 * @return mixed
	 */
	public function getMetadata ()
	{
		return $this->_metadata;
	}

	/**
	 * @param mixed $metadata
	 */
	public function setMetadata ( $metadata )
	{

		if(!empty($metadata) && is_array($metadata)) {
			$this->_metadata =  $metadata ;
		}
	}

	/**
	 * @return mixed
	 */
	public function getDescriptor ()
	{
		return $this->_descriptor;
	}

	/**
	 * @param mixed $descriptor
	 */
	public function setDescriptor ( \com\checkout\ApiServices\SharedModels\Descriptor $descriptor )
	{
		$this->_descriptor = $descriptor;
	}
}