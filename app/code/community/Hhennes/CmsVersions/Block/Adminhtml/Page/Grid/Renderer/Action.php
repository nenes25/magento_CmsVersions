<?php
/**
 * Renderer for Cms version page grid tab
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Block_Adminhtml_Page_Grid_Renderer_Action 
extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return '<a href="' . $this->getUrl('Hhennes_CmsVersions/page/preview/',array('version_id' => $row->getPageVersionId())) . '" target="_blank">' . $this->__('Preview') . '</a>';
    }
}
