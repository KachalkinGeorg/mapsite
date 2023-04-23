<?php

// Protect against hack attempts
if (!defined('NGCMS')) die ('HAL');

// Load library
include_once(root . "/plugins/mapsite/lib/common.php");

//
// Configuration file for plugin
//
pluginsLoadConfig();

if ($_REQUEST['action'] == 'commit') {
	plugin_mark_deinstalled('mapsite');
	remove_mapsite_urls();
} else {
	$text = 'Cейчас плагин будет удален.<br> Вы уверены?';
	generate_install_page('mapsite', $text, 'deinstall');
}
