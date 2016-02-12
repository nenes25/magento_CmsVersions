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
        $newDatas = array(
            'page_id' => $page->getPageId(),
            'title' => $page->getTitle(),
            'meta_keywords' => $page->getMetaKeywords(),
            'meta_description' => $page->getMetaDescription(),
            'identifier' => $page->getIdentifier(),
            'page_content' => $page->getContent(),
            'date_add' => date('Y-m-d H:i:s')
        );
        
        //Insertion et sauvegarde des nouvelles données
		$savePage = Mage::getModel('Hhennes_CmsVersions/page');
		$savePage->setData($newDatas);
		
        try {
			$savePage->save();
		} catch ( Exception $e ) {
			Mage::logException($e);
		}
		
		$this->_deleteOldVersions($savePage);
    }
    
    /**
     * Suppression des version de sauvegarde lors de la suppresion de la page principale
     * @param Varien_Event_Observer $observer 
     */
    public function deletePageVersion(Varien_Event_Observer $observer ) {
        
        $page = $observer->getEvent()->getObject();

		$pageCollection = Mage::getModel('Hhennes_CmsVersions/page')->getCollection()
				 ->addFieldToFilter('page_version_id',$page->getPageId());
		
		$pageCollection->walk('delete');	
        
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
        
		//Insertion et sauvegarde des nouvelles données
		$saveBlock = Mage::getModel('Hhennes_CmsVersions/block');
		$saveBlock->setData($newDatas);
		
        try {
			$saveBlock->save();
		} catch ( Exception $e ) {
			Mage::logException($e);
		}
		
		$this->_deleteOldVersions($saveBlock);
    }
    
    
     /**
     * Suppression des version de sauvegarde lors de la suppresion de la page principale
     * @param Varien_Event_Observer $observer 
     */
    public function deleteBlockVersion(Varien_Event_Observer $observer ) {
        
        //Récupération de l'objet page
        $block = $observer->getEvent()->getObject();
        
        //Récupération des sauvegarde de ce block
		$blockCollection = Mage::getModel('Hhennes_CmsVersions/block')->getCollection()
				 ->addFieldToFilter('block_id',$block->getBlockId());
		
		//Suppression
		$blockCollection->walk('delete');		 
			 
    }
    
    /**
	 * Suppression des sauvegardes supérieures au nombre que l'on veut conserver
	 * @param $object PageVersion ou CMSversion
     */
	 protected function  _deleteOldVersions( $object ) {
		 
		 if ( $object instanceof Hhennes_CmsVersions_Model_Page ) {
			 $collection = Mage::getModel('Hhennes_CmsVersions/page')->getCollection()
						->addFieldToFilter('page_id',$object->getPageId());
		 }
		 else if ( $object instanceof Hhennes_CmsVersions_Model_Block  ) {
			 $collection = Mage::getModel('Hhennes_CmsVersions/block')->getCollection()
						->addFieldToFilter('block_id',$object->getBlockId());
		 }
		 
		 $versionsToKeep = (int)Mage::getStoreConfig('cms/hhennes_cmsversions/nb_versions');
		 $count = $collection->count();
		 
		 if ( $count >  $versionsToKeep ) {
			 
			 $collection->setOrder('date_add','ASC');
			 
			 $i=1;
			 $toDelete =  $count - $versionsToKeep;
			 foreach ( $collection as $object ) {
				 if ( $i <= $toDelete) {
					 try {
						 $object->delete();
					 } catch ( Exception $e) {
						Mage::logException($e); 
					 }	 
				 }
				 $i++;
			 }
			 
		 }
		 else {
			return;
		 }	
		 
	 }
   
}
?>
