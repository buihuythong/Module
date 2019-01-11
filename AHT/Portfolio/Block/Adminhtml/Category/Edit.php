<?php

namespace AHT\Portfolio\Block\Adminhtml\Category;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    public function _construct()
    {
       $this->_blockGroup = "AHT\Portfolio";
       $this->_controller = "Adminhtml\Category";
       $this->_objectId = "id";
        parent::_construct();
    }
}