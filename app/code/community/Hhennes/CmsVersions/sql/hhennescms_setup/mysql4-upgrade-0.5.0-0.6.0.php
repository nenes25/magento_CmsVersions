<?php

/**
 * Module Hhennes_CmsVersions : 
 * 
 * Version 0.6.0 : Gestion des blocks cms
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
$installer = $this;
$installer->startSetup();

$installer->run("CREATE TABLE IF NOT EXISTS {$this->getTable('cms_block_versions')} (
  `block_version_id` smallint(6) NOT NULL auto_increment,
  `block_id` smallint(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  `page_content` mediumtext,
  `stores` varchar(255) NOT NULL,
  `date_add` datetime default NULL,
  PRIMARY KEY  (`block_version_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='CMS block Versions' AUTO_INCREMENT=1");
$installer->endSetup();
?>
