<?php

namespace AHT\Portfolio\Controller\Adminhtml\Portfolio;

use Magento\Backend\App\Action;
use AHT\Portfolio\Model\PortfolioFactory;
use Magento\Setup\Exception;

class Delete extends Action{

    protected $_portfolioFactory;
    public function __construct(Action\Context $context, PortfolioFactory $portfolioFactory)
    {
        $this->_portfolioFactory = $portfolioFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try{

            $id = $this->getRequest()->getParam("id");
            $model = $this->_portfolioFactory->create();
            if(isset($id))
            {
                $model->load($id);

                if($model->getId())
                {
                    $model->delete();
                    $this->messageManager->addSuccessMessage("Delete Success");
                    return $this->_redirect("*/*/");
                }else{
                    $this->messageManager->addErrorMessage("Delete Error, ID empty");
                    return $this->_redirect("*/*/");
                }

            }else{
                $this->messageManager->addErrorMessage("Delete Error, ID empty");
                return $this->_redirect("*/*/");
            }

        }catch (Exception $e)
        {
            $this->messageManager->addErrorMessage("Please Try, Proccess Error");
            return $this->_redirect("*/*/");
        }

    }
}