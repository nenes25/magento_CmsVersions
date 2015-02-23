<?php

/**
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Page_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('pageversion_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('Hhennes_CmsVersions')->__('Page version detail'));
    }

    protected function _beforeToHtml() {
        $this->addTab('form_section', array(
            'label' => Mage::helper('Hhennes_CmsVersions')->__('Page version detail'),
            'title' => Mage::helper('Hhennes_CmsVersions')->__('Page version detail'),
            'content' => $this->getLayout()->createBlock('Hhennes_CmsVersions/adminhtml_page_edit_tab_form')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }

}

?>
