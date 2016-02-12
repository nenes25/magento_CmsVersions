<?php 
class Hhennes_CmsVersions_Block_Adminhtml_Cms_Block_Edit_Tab_Content  
extends Mage_Adminhtml_Block_Cms_Block_Edit_Form
implements Mage_Adminhtml_Block_Widget_Tab_Interface {
	
	
	 /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('edit_form');
        $this->setTitle(Mage::helper('cms')->__('Block Information'));
    }
	
	
	/**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('Hhennes_CmsVersions')->__('Content');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('Hhennes_CmsVersions')->__('Content');
    }

    /**
     * Returns status flag about this tab can be showen or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }	
	
	
}