<?php

namespace AHT\Portfolio\Controller\Adminhtml\Portfolio;

use Magento\Backend\App\Action;

class Add extends Action
{
    public function execute()
    {
        $this->_forward("edit");
    }
}