<?php

/**
 * Grid d'affichage Block Back Office
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Block_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    /**
     * Paramètres du block
     */
    public function __construct() {
        parent::__construct();
        $this->setId('BlockVersionGrid');
        $this->setDefaultSort('block_version_id');
        $this->setDefaultDir('ASC');  
    }

    /**
     * Paramètres de la collection
     * @return type 
     */
    protected function _prepareCollection() {
        $collection = Mage::getModel('Hhennes_CmsVersions/block')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Paramètres des colonnes à afficher
     * @return type 
     */
    protected function _prepareColumns() {
       
        $this->addColumn('block_version_id', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('ID'),
            'align' => 'right',
            'width' => '20px',
            'index' => 'block_version_id',
        ));

        $this->addColumn('block_id', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('block ID'),
            'align' => 'right',
            'width' => '20px',
            'index' => 'block_id',
        ));

        $this->addColumn('identifier', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Identifier'),
            'align' => 'left',
            'index' => 'identifier',
        ));

        $this->addColumn('title', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Block Title'),
            'align' => 'left',
            'index' => 'title',
        ));
        
        $this->addColumn('date_add', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Date add'),
            'align' => 'left',
            'index' => 'date_add',
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
