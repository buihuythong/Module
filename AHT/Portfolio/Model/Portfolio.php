<?php
namespace AHT\Portfolio\Model;
class Portfolio extends \Magento\Framework\Model\AbstractModel{
    protected function _construct(){
        $this->_init("AHT\Portfolio\Model\ResourceModel\Portfolio");
    }
}