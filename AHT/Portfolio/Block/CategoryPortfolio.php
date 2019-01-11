<?php

namespace AHT\Portfolio\Block;

use Magento\Framework\View\Element\Template;
use AHT\Portfolio\Model\ResourceModel\ConfigPortfolio\CollectionFactory;
use AHT\Portfolio\Model\PortfolioFactory;
use AHT\Portfolio\Model\CategoryFactory;

class CategoryPortfolio extends Template
{
    protected $_configPortfolio;
    protected $_portfolioFactory;
    protected $_categoryFactory;

    public function __construct(Template\Context $context, array $data = [], CollectionFactory $configPortfolio, PortfolioFactory $portfolioFactory, CategoryFactory $categoryFactory)
    {
        $this->_categoryFactory = $categoryFactory;
        $this->_portfolioFactory = $portfolioFactory;
        $this->_configPortfolio = $configPortfolio;
        parent::__construct($context, $data);
    }

    public function showDataCategory()
    {
        $model = $this->_categoryFactory->create();
        $data = $model->getCollection()->getData();
        return $data;
    }
    public function urlBase()
    {
        return $this->_baseUrl;
    }




}