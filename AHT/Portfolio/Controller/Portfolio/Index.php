<?php

namespace AHT\Portfolio\Controller\Portfolio;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action{
    protected $_pageFactory;
    protected $_coreRegistry;

    public function __construct(Context $context, PageFactory $pageFactory, Registry $registry)
    {
        $this->_coreRegistry = $registry;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }


    public function execute()
    {

        $id = $this->getRequest()->getParam("id");
        if(isset($id)){
            $this->_coreRegistry->register("category", $id);
        }
        $this->_view->getPage();
        $result = $this->_pageFactory->create();
        $result->getConfig()->getTitle("Page Portfolio");
        return $result;
    }
}