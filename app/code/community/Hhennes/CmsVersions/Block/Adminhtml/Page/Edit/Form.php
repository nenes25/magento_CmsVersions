<?php

/**
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Page_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {
   
    protected function _prepareForm() {

        $form = new Varien_Data_Form(
                        array(
                            'id' => 'edit_form',
                            'action' => $this->getUrl('*/*/restore', array('id' => $this->getRequest()->getParam('id'))),
                            'method' => 'post',
                        ));

        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    } 

}

?>
