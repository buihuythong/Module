<?php

namespace AHT\Portfolio\Block\Adminhtml\Category\Edit;
use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic{

    protected function _prepareForm()
    {
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

        $fieldset->addField(
            "name",
            "text",
            [
                "name" => "name",
                "label" => __("Category Name"),
                "required" => true
            ]
        );

        $form->setHtmlIdPrefix("staff_main_");
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }

}