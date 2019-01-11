<?php

namespace AHT\Portfolio\Block\Adminhtml\Portfolio\Edit;
use Magento\Backend\Block\Widget\Form\Generic;
use AHT\Portfolio\Model\Config\Category;

class Form extends Generic{
    protected $_category;
    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Data\FormFactory $formFactory, array $data = [], Category $category)
    {
        $this->_category = $category;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry("portfolio");
        $form = $this->_formFactory->create(
            [
                "data" => [
                    "id" => "edit_form",
                    "action" => $this->getData("action"),
                    "method" => "POST",
                    "enctype" => "multipart/form-data"
                ]
            ]
        );

        $fieldset = $form->addFieldset(
            "base_fieldset",
            ["legend" => __("General Information"),"class" => "fieldset-wide"]
        );

        if($model->getId())
        {
            $fieldset->addField(
                "id",
                "hidden",
                [
                    "name" => "id",
                ]
            );
        }
        $fieldset->addField(
            "client",
            "text",
            [
                "name" => "client",
                "label" => __("Client"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "project",
            "text",
            [
                "name" => "project",
                "label" => __("Project"),
                "required" => true
            ]
        );

        $fieldset->addField(
            "skill",
            "text",
            [
                "name" => "skill",
                "label" => __("Skill"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "status",
            "select",
            [
                "name" => "status",
                "label" => __("Status"),
                "required" => true,
                "options" => [
                    "1" => "Enabled",
                    "0" => "Disabled",
                ]
            ]
        );
        $fieldset->addField(
            "content",
            "textarea",
            [
                "name" => "content",
                "label" => __("Content"),
                "required" => true,

            ]
        );
        $fieldset->addField(
            "category_id",
            "select",
            [
                "name" => "category_id",
                "label" => __("Category"),
                "required" => true,
                "options" => $this->_category->toOptionArray(),

            ]
        );
        $fieldset->addField(
            "thumbnail",
            "image",
            [
                "name" => "thumbnail",
                "label" => __("Thumbnail"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "image",
            "image",
            [
                "name" => "image",
                "label" => __("Image"),
                "required" => true
            ]
        );

        $form->setHtmlIdPrefix("staff_main_");
        $form->setUseContainer(true);
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
        return parent::_prepareForm();
    }

}