<?php
namespace com\checkout\ApiServices\Tokens\RequestModels;

class PaymentTokenUpdate
{
    private $_id;
    protected $_trackId;
    protected $_udf1;
    protected $_udf2;
    protected $_udf3;
    protected $_udf4;
    protected $_udf5;
    protected $_metadata = [];

    /**
     * PaymentTokenUpdate constructor.
     *
     * @param string $id
     */
    public function __construct($id)
    {
        $this->setId($id);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getUdf1()
    {
        return $this->_udf1;
    }

    /**
     * @param mixed $udf1
     */
    public function setUdf1($udf1)
    {
        $this->_udf1 = $udf1;
    }

    /**
     * @return mixed
     */
    public function getUdf2()
    {
        return $this->_udf2;
    }

    /**
     * @param mixed $udf2
     */
    public function setUdf2($udf2)
    {
        $this->_udf2 = $udf2;
    }

    /**
     * @return mixed
     */
    public function getUdf3()
    {
        return $this->_udf3;
    }

    /**
     * @param mixed $udf3
     */
    public function setUdf3($udf3)
    {
        $this->_udf3 = $udf3;
    }

    /**
     * @return mixed
     */
    public function getUdf4()
    {
        return $this->_udf4;
    }

    /**
     * @param mixed $udf4
     */
    public function setUdf4($udf4)
    {
        $this->_udf4 = $udf4;
    }

    /**
     * @return mixed
     */
    public function getUdf5()
    {
        return $this->_udf5;
    }

    /**
     * @param mixed $udf5
     */
    public function setUdf5($udf5)
    {
        $this->_udf5 = $udf5;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->_metadata = $metadata;
    }

    /**
     * @return mixed
     */
    public function getTrackId()
    {
        return $this->_trackId;
    }

    /**
     * @param mixed $trackId
     */
    public function setTrackId($trackId)
    {
        $this->_trackId = $trackId;
    }
}
