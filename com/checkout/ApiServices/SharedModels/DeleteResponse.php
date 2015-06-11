<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/18/2015
 * Time: 11:49 AM
 */

namespace com\checkout\ApiServices\SharedModels;


class DeleteResponse extends \com\checkout\ApiServices\SharedModels\BaseHttp
{
	private $_delete;
	private $_id;
	public function __construct($response)
	{
        parent::__construct($response);
		$this->_setDelete($response->getDeleted());
		$this->_setId($response->getId());
	}

	/**
	 * @return mixed
	 */
	public function getDelete ()
	{
		return $this->_delete;
	}

	/**
	 * @param mixed $delete
	 */
	private function _setDelete ( $delete )
	{
		$this->_delete = $delete;
	}

	/**
	 * @return mixed
	 */
	public function getId ()
	{
		return $this->_id;
	}

	/**
	 * @param mixed $id
	 */
	private function _setId ( $id )
	{
		$this->_id = $id;
	}
}