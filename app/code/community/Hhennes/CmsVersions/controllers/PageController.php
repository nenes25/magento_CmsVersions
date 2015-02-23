<?php

/**
 * Hhennes_CmsVersions : Controller Front Office 
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
class Hhennes_CmsVersions_PageController extends Mage_Core_Controller_Front_Action  {
    
    /**
     * Prévisualisation d'une version de page
     */
    public function previewAction() {
        
        $this->loadLayout();
        $this->renderLayout();
    }
    
}
