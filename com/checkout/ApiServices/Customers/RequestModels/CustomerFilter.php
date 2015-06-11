<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 3/19/2015
 * Time: 7:49 AM
 */

namespace com\checkout\ApiServices\Customers\RequestModels;


class CustomerFilter
{
	private $_count;
	private $_offset;
	/**
	Holds created start and end dates separated by |
	 */
	private $_created;

	/**
	 * @return mixed
	 */
	public function getCreated ()
	{
		return $this->_created;
	}

	/**
	 * @param mixed $created
	 */
	public function setCreated ( $created )
	{
		$this->_created = $created;
	}

	/**
	 * @return mixed
	 */
	public function getOffset ()
	{
		return $this->_offset;
	}

	/**
	 * @param mixed $offset
	 */
	public function setOffset ( $offset )
	{
		$this->_offset = $offset;
	}

	/**
	 * @return mixed
	 */
	public function getCount ()
	{
		return $this->_count;
	}

	/**
	 * @param mixed $count
	 */
	public function setCount ( $count )
	{
		$this->_count = $count;
	}
}