<?php

 /**
 *  Module Hhennes_CmsVersions : Mise en place d'un historique des pages CMS
 *
 * @category    Hhennes
 * @package     Hhennes_CmsVersions
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author herve - <contact@h-hennes.fr>
 * @copyright Copyright (c) hhennes 2015 (http://www.h-hennes.fr)
 */
$installer = $this;
$installer->startSetup();

$installer->run("CREATE TABLE IF NOT EXISTS {$this->getTable('cms_page_versions')} (
  `page_version_id` smallint(6) NOT NULL auto_increment,
  `page_id` smallint(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `meta_keywords` text NULL,
  `meta_description` text NULL,
  `identifier` varchar(100) NOT NULL,
  `page_content` mediumtext,
  `date_add` datetime default NULL,
  PRIMARY KEY  (`page_version_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='CMS pages Versions' AUTO_INCREMENT=1");

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
