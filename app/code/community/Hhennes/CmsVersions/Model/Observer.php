<?php

/**
 * Module Hhennes_CmsVersions : Mise en place d'un historique des pages CMS
 *
 * @author Europe-internet <dev@europe-internet.net>
 * @version 0.2.0 | $Revision: 1084 $
 * Last-Modified : $Date: 2014-09-10 17:28:36 +0200 (mer., 10 sept. 2014) $
 * Id : $Id: Observer.php 1084 2014-09-10 15:28:36Z herve $
 */
class Hhennes_CmsVersions_Model_Observer {
    
    
    /**
     * Sauvegarde de l'ancienne version de la page
     * @param Varien_Event_Observer $observer 
     */
     public function savePageVersion(Varien_Event_Observer $observer ) {
        
        //Récupération de l'objet page
        $page = $observer->getEvent()->getObject();
        
        //Nos nouvelles variable à insérer
        //Nos nouvelles variables à insérer
        $newDatas = array(
            'page_id' => $page->getPageId(),
            'title' => $page->getTitle(),
            'meta_keywords' => $page->getMetaKeywords(),
            'meta_description' => $page->getMetaDescription(),
            'identifier' => $page->getIdentifier(),
            'page_content' => $page->getContent(),
            'date_add' => date('Y-m-d H:i:s')
        );
        
        //Récupération des ressources BDD
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $tableName = Mage::getSingleton('core/resource')->getTableName('cms_page_versions');
       
        //Insertion des données dans la table
        $write->insert($tableName,$newDatas);
    }
    
    /**
     * Suppression des version de sauvegarde lors de la suppresion de la page principale
     * @param Varien_Event_Observer $observer 
     */
    public function deletePageVersion(Varien_Event_Observer $observer ) {
        
        //Récupération de l'objet page
        $page = $observer->getEvent()->getObject();
        
        //Récupération des ressources BDD
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $tableName = Mage::getSingleton('core/resource')->getTableName('cms_page_versions');
        
        //Suppression des données
        $conditions = array($write->quoteInto('page_id=?', $page->getPageId()));  
        $write->delete($tableName,$conditions);
        
    }
    
    
    /**
     * Sauvegarde de l'ancienne version de la page
     * @param Varien_Event_Observer $observer 
     */
     public function saveBlockVersion(Varien_Event_Observer $observer ) {
        
        //Récupération de l'objet page
        $block = $observer->getEvent()->getObject();
        
        //Nos nouvelles variables à insérer
        $newDatas = array(
            'block_id' => $block->getBlockId(),
            'title' => $block->getTitle(),
            'identifier' => $block->getIdentifier(),
            'page_content' => $block->getContent(),
            'stores' => implode(',',$block->getStores()),
            'date_add' => date('Y-m-d H:i:s')
        );
        
        //Récupération des ressources BDD
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $tableName = Mage::getSingleton('core/resource')->getTableName('cms_block_versions');
       
        //Insertion des données dans la table
        $write->insert($tableName,$newDatas);
    }
    
    
     /**
     * Suppression des version de sauvegarde lors de la suppresion de la page principale
     * @param Varien_Event_Observer $observer 
     */
    public function deleteBlockVersion(Varien_Event_Observer $observer ) {
        
        //Récupération de l'objet page
        $block = $observer->getEvent()->getObject();
        
        //Récupération des ressources BDD
        $write = Mage::getSingleton('core/resource')->getConnection('core_write');
        $tableName = Mage::getSingleton('core/resource')->getTableName('cms_page_versions');
        
        //Suppression des données
        $conditions = array($write->quoteInto('block_id=?', $block->getBlockId()));  
        $write->delete($tableName,$conditions);
        
    }
    
    /**
     * @todo : On garde un nombre maximum de sauvegarde par page
     * une fois ce total dépassé on supprime les éléments en surplus.
     */
   
}
?>
