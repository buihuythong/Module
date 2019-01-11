<?php

namespace AHT\Portfolio\Controller\Adminhtml\Config;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use AHT\Portfolio\Model\ConfigPortfolioFactory;

class Index extends Action{

    protected $_pageFactory;
    protected $_coreRegistry;
    protected $_configFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory, Registry $registry, ConfigPortfolioFactory $configFactory)
    {
        $this->_configFactory = $configFactory;
        $this->_coreRegistry = $registry;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $model = $this->_configFactory->create();
        $data = $model->getCollection()->getData();
        if(!empty($data) && $data[0]["id"] == 1){
            $model->load(1);
        }
        $result = $this->_pageFactory->create();
        $this->_setActiveMenu("AHT_Portfolio::portfolio");
        $result->getConfig()->getTitle()->prepend("Config Portfolio");
        $this->_coreRegistry->register("config",$model);
        return $result;
    }
}