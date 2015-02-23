<?php

/**
 * Controlleur de gestion Back Office de gestions des blocks
 *
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Adminhtml_BlockController extends Mage_Adminhtml_Controller_Action {
    
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
             ->_title($this->__('Block'))
             ->_title($this->__('Manage Content'));
        $this->_initAction();
        $this->renderLayout();
    }
    
    /**
     * Edition d'une pagee
     */
    public function editAction() {
        

        $blockId = $this->getRequest()->getParam('id');
        $blockModel = Mage::getModel('Hhennes_CmsVersions/block')->load($blockId);
        
        if ($blockModel->getId() || $blockId == 0) {
            Mage::register('blockversion_data', $blockModel);
            
            $this->loadLayout();
            $this->_setActiveMenu('cms/');
            $this->_addBreadcrumb('Cms Block Version Manager', 'Cms Block Version Manager');
            $this->_addBreadcrumb('Description', 'Description');
            $this->getLayout()->getBlock('head')
                    ->setCanLoadExtJs(true)
                    ->setCanLoadTinyMce(true);
            $this->_addContent($this->getLayout()
                            ->createBlock('Hhennes_CmsVersions/adminhtml_block_edit'));
            $this->renderLayout();
        } 
        else {
            Mage::getSingleton('adminhtml/session')
                    ->addError(Mage::helper('Hhennes_CmsVersions')->__('block version does not exist'));
            $this->_redirect('*/*/');
        }
    }
    
    /**
     * Restauration d'une version de block
     */
    public function restoreAction() {

        $blockVersionDatas = $this->getRequest()->getParams();

        //On charge la page correspondante
        $block = Mage::getModel('cms/block')->load($blockVersionDatas['block_id']);

        // On mets à jour les données avec les valeurs de notre version de page
        $block->setTitle($blockVersionDatas['title']);
        $block->setIdentifier($blockVersionDatas['identifier']);
        $block->setContent($blockVersionDatas['page_content']);

        if (preg_match(',', $blockVersionDatas['stores']))
            $block->setStores(explode(',', $blockVersionDatas['stores']));
        else
            $block->setStores(array($blockVersionDatas['stores']));

        try {
            $block->save();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            die();
        }

        //Ajout du message de confirmation et redirection
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('Hhennes_CmsVersions')->__('Block version restored with success'));
        $this->_redirect('*/*/');
    }

}

?>
