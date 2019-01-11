<?php

namespace AHT\Portfolio\Controller\Adminhtml\Portfolio;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->_pageFactory->create();
        $result->getConfig()->getTitle()->prepend("List Portfolio");
        $this->_setActiveMenu("AHT_Portfolio::portfolio");
        return $result;
    }
}