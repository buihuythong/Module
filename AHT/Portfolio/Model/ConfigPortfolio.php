<?php
namespace AHT\Portfolio\Model;
class ConfigPortfolio extends \Magento\Framework\Model\AbstractModel{
    protected function _construct(){
        $this->_init("AHT\Portfolio\Model\ResourceModel\ConfigPortfolio");
    }
}