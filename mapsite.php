<?php

# protect against hack attempts
if (!defined('NGCMS')) die ('HAL');

register_plugin_page('mapsite', '', 'plugin_mapsite_screen', 0);

include_once(root . "/plugins/mapsite/lib/common.php");

function plugin_mapsite_screen() {
    global $PFILTERS, $SUPRESS_TEMPLATE_SHOW;

    $SUPRESS_TEMPLATE_SHOW = 1;
    $SUPRESS_MAINBLOCK_SHOW = 1;
	//@header('Content-type: text/xml; charset=utf-8');

   //$output = readfile($_SERVER['DOCUMENT_ROOT']. "/uploads/sitemap.xml");

//header('Content-type: text/xml; charset=utf-8');
//$output = htmlspecialchars(file_get_contents(root. "sitemap.xml"));
    
/* $str = htmlspecialchars(file_get_contents(root. "sitemap.xml"));
  $output = preg_replace('!\r?\n!', '<br>', $str);
  
	print $output; */
header('HTTP/1.1 301 Moved Permanently');
header('Location: http://'.$_SERVER['HTTP_HOST']."/uploads/sitemap.xml");
}