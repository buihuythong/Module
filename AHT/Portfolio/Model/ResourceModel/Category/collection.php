<?php
namespace AHT\Portfolio\Model\ResourceModel\Category;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    protected function _construct(){
        $this->_init("AHT\Portfolio\Model\Category","AHT\Portfolio\Model\ResourceModel\Category");
    }
}