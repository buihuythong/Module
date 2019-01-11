<?php

namespace AHT\Portfolio\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Setup\Exception;

class Edit extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    public function __construct(Action\Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $result = $this->_pageFactory->create();
            $result->getConfig()->getTitle()->prepend("Add Category");
            $this->_setActiveMenu("AHT_Portfolio::portfolio");
            return $result;
        }catch (Exception $e){

            $this->messageManager->addErrorMessage("Please Try , Proccess Error");
        }

    }
}