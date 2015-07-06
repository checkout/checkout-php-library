<?php


namespace com\checkout\ApiServices\Charges\RequestModels;


class ChargeVoid extends BaseChargeInfo
{
    protected $_products = array();

    /**
     * @return mixed
     */
    public function getProducts ()
    {
        return $this->_products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts ( \com\checkout\ApiServices\SharedModels\Product $products )
    {

        $this->_products[] = $products;
    }

}