<?php
namespace AHT\Portfolio\Model\ResourceModel;
class ConfigPortfolio extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb{
    protected function _construct(){
        $this->_init("portfolio_config","id");
    }
}