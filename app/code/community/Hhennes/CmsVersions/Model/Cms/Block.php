<?php

/**
 * Surcharge de la classe Mage_CMs_Model_Block
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_Model_Cms_Block extends Mage_Cms_Model_Block {
    
    /** Ajout d'un paramètre eventprefix pour pouvoir attrapper les events dans le module de sauvegarde */
    protected $_eventPrefix = 'cms_block';
    
}

?>
