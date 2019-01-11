<?php

namespace AHT\Portfolio\Block\Adminhtml\Config\Edit;
use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic{

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Data\FormFactory $formFactory, array $data = [])
    {
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry("config");
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

        if($model->getId()){
            $fieldset->addField(
                "id",
                "hidden",
                [
                    "name" => "id"
                ]
            );
        }

        $fieldset->addField(
            "title",
            "text",
            [
                "name" => "title",
                "label" => __("Page Title"),
                "required" => true
            ]
        );

        $fieldset->addField(
            "description",
            "textarea",
            [
                "name" => "description",
                "label" => __("Meta Description"),
                "required" => true
            ]
        );

        $fieldset->addField(
            "keywords",
            "text",
            [
                "name" => "keywords",
                "label" => __("Meta Keywords"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "count_row",
            "text",
            [
                "name" => "count_row",
                "label" => __("Count a Row"),
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