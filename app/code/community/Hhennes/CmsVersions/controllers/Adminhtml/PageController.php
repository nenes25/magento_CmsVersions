<?php

/**
 * Controlleur de gestion Back Office du module Hhennes_CmsVersions
 *
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Adminhtml_PageController extends Mage_Adminhtml_Controller_Action {
    
    /**
     * Initialisation du module
     *
     * @return Mage_Adminhtml_Cms_PageController
     */
    protected function _initAction(){
        
        $this->loadLayout()
            ->_setActiveMenu('cms/Hhennes_CmsVersions');
        return $this;
    }
    
    /**
     * Fonction d'index par défaut
     */
    public function indexAction()
    {
        $this->_title($this->__('CMS Versions'))
             ->_title($this->__('Pages'))
             ->_title($this->__('Manage Content'));
        $this->_initAction();
        $this->renderLayout();
    }
    
    /**
     * Edition d'une pagee
     */
    public function editAction() {
        

        $pageId = $this->getRequest()->getParam('id');
        $pageModel = Mage::getModel('Hhennes_CmsVersions/page')->load($pageId);
        if ($pageModel->getId() || $pageId == 0) {
            Mage::register('pageversion_data', $pageModel);
            
            $this->loadLayout();
            $this->_setActiveMenu('cms/');
            $this->_addBreadcrumb('Cms Page Version Manager', 'Cms Page Version Manager');
            $this->_addBreadcrumb('Description', 'Description');
            $this->getLayout()->getBlock('head')
                    ->setCanLoadExtJs(true)
                    ->setCanLoadTinyMce(true);
            $this->_addContent($this->getLayout()->createBlock('Hhennes_CmsVersions/adminhtml_page_edit'))
                 ->_addLeft($this->getLayout()->createBlock('Hhennes_CmsVersions/adminhtml_page_edit_tabs')
            );
            $this->renderLayout();
        } 
        else {
            Mage::getSingleton('adminhtml/session')
                    ->addError(Mage::helper('Hhennes_CmsVersions')->__('page version does not exist'));
            $this->_redirect('*/*/');
        }
    }
    
    /**
     * Restauration d'une version de page
     */
    public function restoreAction(){
        
        $PageVersionDatas = $this->getRequest()->getParams();
        
        //On charge la page correspondante
        $page = Mage::getModel('cms/page')->load($PageVersionDatas['page_id']);
        
        // On mets à jour les données avec les valeurs de notre version de page
        $page->setTitle($PageVersionDatas['title']);
        $page->setMetaKeywords($PageVersionDatas['meta_keywords']);
        $page->setMetaDescription($PageVersionDatas['meta_description']);
        $page->setIdentifier($PageVersionDatas['identifier']);
        $page->setContent($PageVersionDatas['page_content']);
        
        $page->save();
        
        //Ajout du message de confirmation et redirection
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('Hhennes_CmsVersions')->__('Page version restored with success'));
        $this->_redirect('*/*/');
    }
    
}

?>
