<?php

namespace AHT\Portfolio\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use AHT\Portfolio\Model\ResourceModel\ConfigPortfolio\CollectionFactory;
use AHT\Portfolio\Model\PortfolioFactory;
use AHT\Portfolio\Model\CategoryFactory;

class Profile extends Template
{
    protected $_configPortfolio;
    protected $_portfolioFactory;
    protected $_coreRegistry;
    protected $_categoryFactory;

    public function __construct(Template\Context $context, array $data = [], CollectionFactory $configPortfolio, PortfolioFactory $portfolioFactory, Registry $coreRegistry, CategoryFactory $categoryFactory)
    {
        $this->_categoryFactory = $categoryFactory;
        $this->_coreRegistry = $coreRegistry;
        $this->_portfolioFactory = $portfolioFactory;
        $this->_configPortfolio = $configPortfolio;
        parent::__construct($context, $data);
    }

    public function showAllData()
    {
        $model = $this->_coreRegistry->registry("profile");
        $data = $model->getData();
        return $data;
    }

    public function showCategory($id)
    {
        $model = $this->_categoryFactory->create();
        $model->load($id);
        $data = $model->getName();
        return $data;

    }

    public function getUrlMedia()
    {
        $mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
        return $mediaUrl;
    }





}