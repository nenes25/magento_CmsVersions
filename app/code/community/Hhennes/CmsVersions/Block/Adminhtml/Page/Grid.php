<?php

/**
 * Enter File description
 *
 * @author Europe-internet <dev@europe-internet.net>
 * @version 0.2.0 | $Revision: 462 $
 * Last-Modified : $Date: 2012-10-15 16:05:46 +0200 (lun., 15 oct. 2012) $
 * Id : $Id: Grid.php 462 2012-10-15 14:05:46Z herve $
 */
class Hhennes_CmsVersions_Block_Adminhtml_Page_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    /**
     * Paramètres du block
     */
    public function __construct() {
        parent::__construct();
        $this->setId('PageVersionGrid');
        $this->setDefaultSort('page_version_id');
        $this->setDefaultDir('ASC');
        
        //$this->setSaveParametersInSession(true);
    }

    /**
     * Paramètres de la collection
     * @return type 
     */
    protected function _prepareCollection() {

        $collection = Mage::getModel('Hhennes_CmsVersions/page')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Paramètres des colonnes à afficher
     * @return type 
     */
    protected function _prepareColumns() {
       
        $this->addColumn('page_version_id', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('ID'),
            'align' => 'right',
            'width' => '20px',
            'index' => 'page_version_id',
        ));

        $this->addColumn('page_id', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Page ID'),
            'align' => 'right',
            'width' => '20px',
            'index' => 'page_id',
        ));

        $this->addColumn('identifier', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Url Key'),
            'align' => 'left',
            'index' => 'identifier',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));
        
        $this->addColumn('date_add', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Date add'),
            'align' => 'left',
            'index' => 'date_add',
        ));

        $this->addColumn('meta_keywords', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Meta Keywords'),
            'align' => 'left',
            'index' => 'meta_keywords',
        ));

        $this->addColumn('meta_description', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Meta description'),
            'align' => 'left',
            'index' => 'meta_description',
        ));


        return parent::_prepareColumns();
    }
    
    
    /**
     * Lien d'édition des urls
     */
    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}

?>
