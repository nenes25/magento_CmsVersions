<?php

/**
 * Grid d'affichage Page Back Office
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Page extends Mage_Adminhtml_Block_Widget_Grid_Container {
    
    public function __construct() {
       
        $this->_controller = 'adminhtml_page';
        $this->_blockGroup = 'Hhennes_CmsVersions';
        $this->_headerText = $this->__('Manage Cms page version');
        parent::__construct();
        $this->removeButton('add');
    }
    
}

?>
