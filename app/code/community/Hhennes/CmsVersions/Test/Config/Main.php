<?php
/**
 *
 * Fichier de base pour tester la bonne configuration d'un module
 *
 */
class Hhennes_CmsVersions_Test_Config_Main extends EcomDev_PHPUnit_Test_Case_Config
{
    /**
     * Paramètres de la classe pour tester automatiquement que le fichier de configuration respecte certaines normes
     * Permets de génériser la création de ce fichier de test pour l'ensemble des modules
     */
    protected $_codePool       = 'community';
    protected $_currentVersion = '0.1.1';
    protected $_useResource    = true;
    protected $_useLayout      = true;
    protected $_nodeName       = 'Hhennes_CmsVersions'; //Nom utilisé pour les noeud ( models / helpers/ blocks )

    /**
     * Test que le module est actif
     */

    public function testModuleIsActive()
    {
        $this->assertModuleIsActive();
    }

    /**
     * Tests globals sur le module
     */
    public function testModuleGlobal()
    {
        //CodePool
        $this->assertModuleCodePool($this->_codePool);

        //Version du module
        $this->assertModuleVersion($this->_currentVersion);
    }

    /**
     * Vérification des conditions de setup du module
     */
    public function testSetupResources()
    {
        if ($this->_useResource) {
            $this->assertSetupResourceDefined();
            $this->assertSetupResourceExists();
        }
    }

    /**
     * Vérification des alias de la classe
     * ( Models/ ResourceModel / Helpers / Blocks )
     */
    public function testClassesAlias()
    {
        //Models
        $this->assertModelAlias($this->_nodeName.'/block', 'Hhennes_CmsVersions_Model_Block');
        $this->assertModelAlias($this->_nodeName.'/page', 'Hhennes_CmsVersions_Model_Page');
        $this->assertModelAlias($this->_nodeName.'/observer', 'Hhennes_CmsVersions_Model_Observer');
       
        $this->assertResourceModelAlias($this->_nodeName.'/block', 'Hhennes_CmsVersions_Model_Mysql4_Block');
        $this->assertResourceModelAlias($this->_nodeName.'/block_collection', 'Hhennes_CmsVersions_Model_Mysql4_Block_Collection');
         $this->assertResourceModelAlias($this->_nodeName.'/page', 'Hhennes_CmsVersions_Model_Mysql4_Page');
        $this->assertResourceModelAlias($this->_nodeName.'/page_collection', 'Hhennes_CmsVersions_Model_Mysql4_Page_Collection');
        
        //Helpers
        $this->assertHelperAlias($this->_nodeName, 'Hhennes_CmsVersions_Helper_Data');
        
        //blocks
        $this->assertBlockAlias($this->_nodeName.'/page', 'Hhennes_CmsVersions_Block_Page');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page', 'Hhennes_CmsVersions_Block_Adminhtml_Page');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page_grid', 'Hhennes_CmsVersions_Block_Adminhtml_Page_Grid');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page_grid_renderer_action', 'Hhennes_CmsVersions_Block_Adminhtml_Page_Grid_Renderer_Action');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page_edit', 'Hhennes_CmsVersions_Block_Adminhtml_Page_Edit');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page_edit_form', 'Hhennes_CmsVersions_Block_Adminhtml_Page_Edit_Form');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page_edit_tabs', 'Hhennes_CmsVersions_Block_Adminhtml_Page_Edit_Tabs');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_page_edit_tab_form', 'Hhennes_CmsVersions_Block_Adminhtml_Page_Edit_Tab_Form');
        
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_block', 'Hhennes_CmsVersions_Block_Adminhtml_Block');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_block_edit', 'Hhennes_CmsVersions_Block_Adminhtml_Block_Edit');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_block_edit_form', 'Hhennes_CmsVersions_Block_Adminhtml_Block_Edit_Form');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_block_edit_tabs', 'Hhennes_CmsVersions_Block_Adminhtml_Block_Edit_Tabs');
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_block_edit_tab_form', 'Hhennes_CmsVersions_Block_Adminhtml_Block_Edit_Tab_Form');
        
        $this->assertBlockAlias($this->_nodeName.'/adminhtml_cms_page_tab_cmsversions', 'Hhennes_CmsVersions_Block_Adminhtml_Cms_Page_Tab_Cmsversions');
        
        
        
    }

    /**
     * Tests que le layout fonctionne bien
     */
    public function testLayout()
    {
        if ($this->_useLayout) {
            //BO
            $this->assertLayoutFileDefined('adminhtml', 'Hhennes_CmsVersions.xml');
            $this->assertLayoutFileExists('adminhtml', 'Hhennes_CmsVersions.xml');
            //FO
            $this->assertLayoutFileDefined('frontend', 'hhennes_cmsversions.xml');
            $this->assertLayoutFileExists('frontend', 'hhennes_cmsversions.xml');
        }
    }
    
    /**
     * Tests des évenements
     */
    public function testEvents()
    {
        $this->assertEventObserverDefined('global', 'cms_page_save_after', 'Hhennes_CmsVersions/observer', 'savePageVersion');
        $this->assertEventObserverDefined('global', 'cms_page_delete_after', 'Hhennes_CmsVersions/observer', 'deletePageVersion');
        $this->assertEventObserverDefined('global', 'cms_block_save_after', 'Hhennes_CmsVersions/observer', 'saveBlockVersion');
        $this->assertEventObserverDefined('global', 'cms_block_delete_after', 'Hhennes_CmsVersions/observer', 'deleteBlockVersion');
    }
    
}
