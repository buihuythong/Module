<?php

namespace AHT\Portfolio\Controller\Portfolio;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use AHT\Portfolio\Model\PortfolioFactory;

class Show extends Action{
    protected $_pageFactory;
    protected $_portfolioFactory;
    protected $_coreRegistry;
    public function __construct(Context $context, PageFactory $pageFactory, PortfolioFactory $portfolioFactory, Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;
        $this->_portfolioFactory = $portfolioFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }


    public function execute()
    {
        $id = $this->getRequest()->getParam("id");
        $model = $this->_portfolioFactory->create();
        if(isset($id)){
            $model->load($id);
            if(!$model->getId()){
                $this->messageManager->addErrorMessage("Show Profile Error, Please Try");
                return $this->_redirect("*/*/index");
            }
        }else{
            $this->messageManager->addErrorMessage("Show Profile Error, Please Try");
            return $this->_redirect("*/*/index");
        }
        $result = $this->_pageFactory->create();
        $this->_coreRegistry->register("profile", $model);
        return $result;
    }
}