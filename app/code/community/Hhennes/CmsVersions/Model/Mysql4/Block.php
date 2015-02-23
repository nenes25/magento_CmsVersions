<?php

/**
 * Page du model Mysql4
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Model_Mysql4_Block extends Mage_Core_Model_Mysql4_Abstract {
    
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('Hhennes_CmsVersions/block', 'block_version_id');
    }
    
}

?>
