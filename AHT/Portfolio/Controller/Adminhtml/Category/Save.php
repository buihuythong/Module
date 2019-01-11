<?php

namespace AHT\Portfolio\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Setup\Exception;
use AHT\Portfolio\Model\CategoryFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $_categoryFactory;

    public function __construct(Action\Context $context, CategoryFactory $categoryFactory)
    {
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try{
            $name = $this->getRequest()->getParam("name");
            if($name != "")
            {
                $model = $this->_categoryFactory->create();
                $model->addData([
                    "name" => $name
                ])->save();

                $this->messageManager->addSuccess(__("Add Category Success"));
                return $this->_redirect("portfolio/category/edit");
            }else{
                $this->messageManager->addSuccess(__("Add Category Fail, Please Enter Category Name"));
                return $this->_redirect("portfolio/category/edit");
            }

        }catch (Exception $e)
        {
            $this->messageManager->addErrorMessage("Please Try , Proccess Error");
        }




    }
}