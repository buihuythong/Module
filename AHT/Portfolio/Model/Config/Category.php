<?php
namespace AHT\Portfolio\Model\Config;
use Magento\Framework\Option\ArrayInterface;
use AHT\Portfolio\Model\CategoryFactory;

class Category implements ArrayInterface{
    protected $_categoryFactory;
    public function __construct(CategoryFactory $categoryFactory)
    {
        $this->_categoryFactory = $categoryFactory;
    }

    public function toOptionArray(){
        $model = $this->_categoryFactory->create();
        $data = $model->getCollection()->getData();
        $option = [];
        foreach ($data as $key => $value)
        {
            $key = $value["id"];
            $option[$key] =$value["name"];
        }


        return $option;
    }
}