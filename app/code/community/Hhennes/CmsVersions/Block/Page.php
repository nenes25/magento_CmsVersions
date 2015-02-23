<?php

/**
 * Block Front Office
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Page extends Mage_Core_Block_Template {
    
    /**
     * Récupération des informations de la page
     */
    public function getPageVersion() {
        
        $pageId = $this->getRequest()->getParam('version_id');
        $pageVersion = Mage::getModel('Hhennes_CmsVersions/page')->load($pageId);
        
        return $pageVersion;
    }
    
    public function _prepareLayout() {
        
        $pageVersion = $this->getPageVersion();
        
        //Mise en place des titres
        $head = $this->getLayout()->getBlock('head');
        
        if ($head) {
            $head->setTitle($pageVersion->getTitle());
            $head->setKeywords($pageVersion->getMetaKeywords());
            $head->setDescription($pageVersion->getMetaDescription());
        }
        
        //Mise en place du fil d'ariane
        $breadcrumbs = $this->getLayout()->getBlock('breadcrumbs');
        $breadcrumbs->addCrumb('home', array('label'=>Mage::helper('cms')->__('Home'), 'title'=>Mage::helper('cms')->__('Go to Home Page'), 'link'=>Mage::getBaseUrl()));
        $breadcrumbs->addCrumb('cms_page', array('label'=>$pageVersion->getTitle(), 'title'=>$pageVersion->getTitle()));
        
        parent::_prepareLayout();
    }
    
    /**
     * Prepare HTML content
     *
     * @return string
     */
    protected function _toHtml()
    {
        /* @var $helper Mage_Cms_Helper_Data */
        $helper = Mage::helper('cms');
        $processor = $helper->getPageTemplateProcessor();
        $html = $processor->filter($this->getPageVersion()->getContent());
        $html = $this->getMessagesBlock()->getGroupedHtml() . $html;
        return $html;
    }
    
}

?>
