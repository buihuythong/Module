<?php

namespace AHT\Portfolio\Controller\Adminhtml\Portfolio;

use AHT\Portfolio\Model\Portfolio;
use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use AHT\Portfolio\Model\PortfolioFactory;
use Magento\Setup\Exception;

class Edit extends Action
{
    protected $_coreRegistry;
    protected $_pageFactory;
    protected $_portfolioFactory;
    public function __construct(Action\Context $context, PageFactory $pageFactory, PortfolioFactory $portfolioFactory, Registry $registry)
    {
        $this->_coreRegistry = $registry;
        $this->_portfolioFactory = $portfolioFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try{
            $id = $this->getRequest()->getParam("id");
            $model = $this->_portfolioFactory->create();
            if(isset($id))
            {
                $model = $model->load($id);

                $title = "Edit Record : " . $id;
            }else{
                $title = "Add Record";
            }
            $result = $this->_pageFactory->create();
            $this->_setActiveMenu("AHT_Portfolio::portfolio");
            $result->getConfig()->getTitle()->prepend(__($title));
            $this->_coreRegistry->register("portfolio", $model);
            return $result;
        }catch (Exception $e){
            $this->messageManager->addErrorMessage("Please Try, Proccess Error");
            return $this->_redirect("*/*/");
        }

    }
}