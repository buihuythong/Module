<?php

namespace AHT\Portfolio\Controller\Adminhtml\Portfolio;

use AHT\Portfolio\Model\Portfolio;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use AHT\Portfolio\Model\PortfolioFactory;
use Magento\Setup\Exception;

class Save extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    protected $_portfolioFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory, PortfolioFactory $portfolio)
    {
        $this->_portfolioFactory = $portfolio;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try{
            $model = $this->_portfolioFactory->create();
            $imageHelp = $this->_objectManager->get("AHT\Portfolio\Helper\Image");
            $data = $this->getRequest()->getParams();
            $imageRequest = $this->getRequest()->getFiles();
            if(isset($data["id"])){
                $id = $data["id"];
            }

            $client = $data["client"];

            $project = $data["project"];

            $skill = $data["skill"];

            $status = $data["status"];

            $content = $data["content"];

            $category_id = $data["category_id"];

            $thumbnail = $imageRequest["thumbnail"]["name"];

            $image = $imageRequest["image"]["name"];


            if(isset($id))
            {
                $model->load($id);

                if($model->getId())
                {
                    $model->setClient($client);
                    $model->setProject($project);
                    $model->setSkill($skill);
                    $model->setStatus($status);
                    $model->setContent($content);
                    $model->setCategory_id($category_id);

                    if($thumbnail != null)
                    {
                        $imgThumbnail = $imageHelp->uploadImage("thumbnail");


                        $model->setThumbnail("portfolio/" . $imgThumbnail);
                    }

                    if($image != null)
                    {
                        $imgImage = $imageHelp->uploadImage("image");
                        $model->setImage("portfolio/" . $imgImage);
                    }

                    $model->save();

                    $this->messageManager->addSuccessMessage("Edit Success");

                    return $this->_redirect("*/*/index");
                } else{
                    $this->messageManager->addErrorMessage("Edit Fail, ID not isset");

                    return $this->_redirect("*/*/index");
                }


            }else{
                $model = $this->_portfolioFactory->create();
                if($thumbnail != null)
                {
                    $imgThumbnail = $imageHelp->uploadImage("thumbnail");
                }else{
                    $this->messageManager->addErrorMessage("Please select thumbnail");
                    return $this->_redirect("*/*/");
                }

                if($image != null) {
                    $imgImage = $imageHelp->uploadImage("image");
                }else{
                    $this->messageManager->addErrorMessage("Please select image");
                    return $this->_redirect("*/*/");
                }

                $model->addData([
                    "client" => $client,
                    "project" => $project,
                    "skill" => $skill,
                    "status" => $status,
                    "content" => $content,
                    "category_id" => $category_id,
                    "thumbnail" => "portfolio/" . $imgThumbnail,
                    "image" => "portfolio/" .$imgImage,
                ])->save();

                $this->messageManager->addSuccessMessage("Add Widget Success !!!");
                return $this->_redirect("*/*/index");
            }

        }catch (Exception $e){
            $this->messageManager->addErrorMessage("Please Try, Proccess Error");
            return $this->_redirect("*/*/index");
        }

    }
}