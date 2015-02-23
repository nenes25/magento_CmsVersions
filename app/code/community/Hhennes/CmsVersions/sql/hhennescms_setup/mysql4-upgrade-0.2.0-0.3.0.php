<?php

/**
 * Module Hhennes_CmsVersions : 
 * 
 * Version 0.3.0 mise en place d'un formulaire d'édition pour visualiser les données
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
$installer = $this;
$installer->startSetup();
//On renomme le champ "content" en "page_content" pour pouvoir afficher le wysiwyg dans l'admin
$installer->run("ALTER TABLE {$this->getTable('cms_page_versions')} CHANGE  `content` `page_content` MEDIUMTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL");
$installer->endSetup();
?>
`
