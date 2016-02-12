<?php 
class Hhennes_CmsVersions_Block_Adminhtml_Cms_Block_Edit_Tab_Cmsversions  
extends Mage_Adminhtml_Block_Widget_Grid
implements Mage_Adminhtml_Block_Widget_Tab_Interface {

     /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('Hhennes_CmsVersions')->__('Cms versions');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('Hhennes_CmsVersions')->__('Cms versions');
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
     
    
    /**
     * Paramètres du block
     */
    public function __construct() {
        parent::__construct();
        $this->setId('BlockVersionGrid');
        $this->setDefaultSort('version_date_add');
        $this->setDefaultDir('DESC');
        $this->setSortable(false);
        $this->setPagerVisibility(false);
        $this->setFilterVisibility(false);
    }

    /**
     * Paramètres de la collection
     * @return type 
     */
    protected function _prepareCollection() {
        $model = Mage::registry('cms_block');
        $collection = Mage::getModel('Hhennes_CmsVersions/block')
                ->getCollection()
                ->addFieldToFilter('block_id',$model->getBlockId());
        
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Paramètres des colonnes à afficher
     * @return type 
     */
    protected function _prepareColumns() {
        
        $this->addColumn('version_date_add', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Date add'),
            'align' => 'left',
            'index' => 'date_add',
        ));

        $this->addColumn('version_identifier', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Url Key'),
            'align' => 'left',
            'index' => 'identifier',
        ));

        $this->addColumn('version_title', array(
            'header' => Mage::helper('Hhennes_CmsVersions')->__('Title'),
            'align' => 'left',
            'index' => 'title',
        ));

        $this->addColumn('action', array(
            'header'    =>  ' ',
            'filter'    =>  false,
            'sortable'  =>  false,
            'width'     => '100px',
            'renderer'  =>  'Hhennes_CmsVersions/adminhtml_page_grid_renderer_action'
        ));
        
        return parent::_prepareColumns();
    }
    
    /**
     * Lien d'édition des urls
     */
    public function getRowUrl($row) {
        return $this->getUrl('Hhennes_CmsVersions/adminhtml_block/edit', array('id' => $row->getId()));
    }
	
}
    
    