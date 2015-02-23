<?php

/**
 * Edit Page Back Office
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Page_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {

        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'Hhennes_CmsVersions';
        $this->_controller = 'adminhtml_page';
        
        //On masque les bouton supprimer et réinitialiser
        $this->_removeButton('delete');
        $this->_removeButton('reset');
        
        //On change le label du bouton "Ajouter"
        $this->_updateButton('save','label', Mage::helper('Hhennes_CmsVersions')->__('Restore page Version'));
        
        //Ajout d'un bouton de Prévisualisation
        $this->_addButton('preview', array(
                'label'=> Mage::helper('Hhennes_CmsVersions')->__('Preview page Version'),
                'onclick' => 'previewPageVersion();'
                ));
        
        //Js Spécifique du bouton de prévisualisation
        $this->_formScripts[] = "
            function previewPageVersion() {
             window.open('".$this->getUrl('Hhennes_CmsVersions/page/preview/',array('version_id' => $this->getRequest()->getParam('id')))."'); 
             return false;  
            }
        ";
        
    }
    
    /**
     * Titre de la page
     * @return type 
     */
    public function getHeaderText() {      
       return Mage::helper('Hhennes_CmsVersions')->__("Edition of cms page version");
    }

}
?>
