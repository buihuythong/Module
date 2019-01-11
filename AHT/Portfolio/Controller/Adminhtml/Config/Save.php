<?php

namespace AHT\Portfolio\Controller\Adminhtml\Config;

use Magento\Backend\App\Action;
use AHT\Portfolio\Model\ConfigPortfolioFactory;

class Save extends Action{
    protected $_configPortfolio;
    public function __construct(Action\Context $context, ConfigPortfolioFactory $configPortfolio)
    {
        $this->_configPortfolio = $configPortfolio;
        parent::__construct($context);
    }

    public function execute()
    {
        try{
            $model = $this->_configPortfolio->create();
            $data = $this->getRequest()->getParams();
            $title = $data["title"];
            $description = $data["description"];
            $keywords = $data["keywords"];
            $count_row = $data["count_row"];

            if(!isset($data['id'])){

                $model->addData([
                    "title" => $title,
                    "description" => $description,
                    "keywords" => $keywords,
                    "count_row" => $count_row
                ])->save();

                $this->messageManager->addSuccessMessage("Add Config Success");
                $this->_redirect("*/*/");
            }else{
                $id = $data["id"];

                $model->load($id);

                $model->setTitle($title);
                $model->setDescription($description);
                $model->setKeywords($keywords);
                $model->setCount_row($count_row);
                $model->save();
                $this->messageManager->addSuccessMessage("Change Config Portfolio Success");
                $this->_redirect("*/*/");
            }
        }catch (\Exception $e){
            $this->messageManager->addErrorMessage("Please Try, Proccess Error");
            $this->_redirect("*/*/");
        }


    }
}