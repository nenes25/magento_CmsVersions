<?php

class Hhennes_CmsVersions_Block_Adminhtml_Cms_Block_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {
	
	public function __construct() {
		parent::__construct();
		
		$this->setId('block_tabs');
		$this->setDestElementId('block_form');
		$this->setTitle(Mage::helper('Hhennes_CmsVersions')->__('Block Information'));
	}
}