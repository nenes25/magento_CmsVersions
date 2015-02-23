<?php

/**
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Block_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
    
    /**
     * Définition du formulaire
     * @return type 
     */
    protected function _prepareForm() {

        $form = new Varien_Data_Form(
                        array(
                            'id' => 'edit_form',
                            'action' => $this->getUrl('*/*/restore', array('id' => $this->getRequest()->getParam('id'))),
                            'method' => 'post',
                        ));
        
        $form->setUseContainer(true);
        $this->setForm($form);
        
        $fieldset = $form->addFieldset('page_form', array('legend' => Mage::helper('Hhennes_CmsVersions')->__('Block Version information'),'class' => 'fieldset-wide'));

        $fieldset->addField('block_id', 'text', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('block Id'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'block_id',
            'readonly' => true,
        ));

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title',
            'readonly' => true,
        ));


        $fieldset->addField('identifier', 'text', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('block identifier'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'identifier',
            'readonly' => true,
        ));



        $fieldset->addField('page_content', 'editor', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('content'),
            'required' => true,
            'name' => 'page_content',
            'style' => 'height:36em;',
            'wysiwyg' => true,
            'config' => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
        ));

        $fieldset->addField('date_add', 'text', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('date add'),
            'class' => 'required-entry',
            'required' => false,
            'name' => 'date_add',
            'readonly' => true,
        ));
        
         $fieldset->addField('stores', 'hidden', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('stores'),
            'required' => false,
            'name' => 'stores',
            'readonly' => true,
        ));



        if (Mage::registry('blockversion_data')) {
            $form->setValues(Mage::registry('blockversion_data')->getData());
        }
        return parent::_prepareForm();
    }

}

?>
