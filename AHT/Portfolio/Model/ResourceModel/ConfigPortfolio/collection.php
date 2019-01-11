<?php
namespace AHT\Portfolio\Model\ResourceModel\ConfigPortfolio;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    protected function _construct(){
        $this->_init("AHT\Portfolio\Model\ConfigPortfolio","AHT\Portfolio\Model\ResourceModel\ConfigPortfolio");
    }
}