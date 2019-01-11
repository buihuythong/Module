<?php
namespace AHT\Portfolio\Model\ResourceModel\Portfolio;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
    protected function _construct(){
        $this->_init("AHT\Portfolio\Model\Portfolio","AHT\Portfolio\Model\ResourceModel\Portfolio");
    }
}