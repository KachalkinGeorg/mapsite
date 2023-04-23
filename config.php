<?php

# protect against hack attempts
if (!defined('NGCMS')) die ('HAL');

pluginsLoadConfig();
LoadPluginLang('mapsite', 'config', '', '', '#');

switch ($_REQUEST['action']) {
	case 'about':			about();		break;
	default: main();
}

function about()
{global $twig, $lang, $breadcrumb;
	$tpath = locatePluginTemplates(array('main', 'about'), 'mapsite', 1);
	$breadcrumb = breadcrumb('<i class="fa fa-sitemap btn-position"></i><span class="text-semibold">'.$lang['mapsite']['mapsite'].'</span>', array('?mod=extras' => '<i class="fa fa-puzzle-piece btn-position"></i>'.$lang['extras'].'', '?mod=extra-config&plugin=mapsite' => '<i class="fa fa-sitemap btn-position"></i>'.$lang['mapsite']['mapsite'].'',  '<i class="fa fa-exclamation-circle btn-position"></i>'.$lang['mapsite']['about'].'' ) );

	$xt = $twig->loadTemplate($tpath['about'].'about.tpl');
	$tVars = array();
	$xg = $twig->loadTemplate($tpath['main'].'main.tpl');
	
	$about = 'версия 0.2';
	
	$tVars = array(
		'global' 	=> $lang['mapsite']['about'],
		'header' 	=> $about,
		'map_dates' => '',
		'entries' 	=> $xt->render($tVars)
	);
	
	print $xg->render($tVars);
}

function main()
{global $twig, $lang, $breadcrumb;
	
	$tpath = locatePluginTemplates(array('main', 'general.from'), 'mapsite', 1);
	$breadcrumb = breadcrumb('<i class="fa fa-sitemap btn-position"></i><span class="text-semibold">'.$lang['mapsite']['mapsite'].'</span>', array('?mod=extras' => '<i class="fa fa-puzzle-piece btn-position"></i>'.$lang['extras'].'', '?mod=extra-config&plugin=mapsite' => '<i class="fa fa-sitemap btn-position"></i>'.$lang['mapsite']['mapsite'].'' ) );

	if ($_POST['action'] == "create") {
		include_once(root . "/plugins/mapsite/lib/mapsite.class.php");

		$sitemap = create_index();
		
		$sitemap = create_map();
		
		$fcHandler = fopen($_SERVER['DOCUMENT_ROOT']. "/uploads/sitemap.xml", "wb+");
		if ($fcHandler) {
			fwrite($fcHandler, $sitemap);
			fclose($fcHandler);
			@chmod($_SERVER['DOCUMENT_ROOT']. "/uploads/sitemap.xml", 0666);
		} else {
			msg(['type' => 'error', 'text' => $lang['mapsite']['msge_save_error'], 'info' => $lang['mapsite']['msge_save_error#desc']]);
			return print_msg( 'error', ''.$lang['mapsite']['mapsite'].'', $lang['mapsite']['msge_save_error'], 'javascript:history.go(-1)' );
		}

	}

	if (isset($_REQUEST['submit'])){
		pluginSetVariable('mapsite', 'main', intval($_REQUEST['main']));
		pluginSetVariable('mapsite', 'mainp', intval($_REQUEST['mainp']));
		pluginSetVariable('mapsite', 'main_pr', $_REQUEST['main_pr']);
		pluginSetVariable('mapsite', 'main_p_pr', $_REQUEST['main_p_pr']);
		pluginSetVariable('mapsite', 'news', intval($_REQUEST['news']));
		pluginSetVariable('mapsite', 'news_pr', $_REQUEST['news_pr']);
		pluginSetVariable('mapsite', 'stat', intval($_REQUEST['stat']));
		pluginSetVariable('mapsite', 'stat_pr', $_REQUEST['stat_pr']);
		pluginSetVariable('mapsite', 'cat', intval($_REQUEST['cat']));
		pluginSetVariable('mapsite', 'cat_pr', $_REQUEST['cat_pr']);
		pluginSetVariable('mapsite', 'catp', intval($_REQUEST['catp']));
		pluginSetVariable('mapsite', 'catp_pr', $_REQUEST['catp_pr']);
		pluginsSaveConfig();
		msg(array("type" => "info", "info" => $lang['mapsite']['map_done']));
		return print_msg( 'info', ''.$lang['mapsite']['mapsite'].'', str_replace('%date%', date('d.m.Y H:i', time()), $lang['mapsite']['map_done#desc']), '?mod=extra-config&plugin=mapsite' );
	}

	$main = pluginGetVariable('mapsite', 'main');
	$main = '<option value="0" '.($main==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($main==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$mainp = pluginGetVariable('mapsite', 'mainp');
	$mainp = '<option value="0" '.($mainp==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($mainp==1?'selected':'').'>'.$lang['yesa'].'</option>';

	$main_pr = pluginGetVariable('mapsite', 'main_pr');
	$main_p_pr = pluginGetVariable('mapsite', 'main_p_pr');

	$news = pluginGetVariable('mapsite', 'news');
	$news = '<option value="0" '.($news==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($news==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$news_pr = pluginGetVariable('mapsite', 'news_pr');

	$stat = pluginGetVariable('mapsite', 'stat');
	$stat = '<option value="0" '.($stat==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($stat==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$stat_pr = pluginGetVariable('mapsite', 'stat_pr');

	$cat = pluginGetVariable('mapsite', 'cat');
	$cat = '<option value="0" '.($cat==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($cat==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$cat_pr = pluginGetVariable('mapsite', 'cat_pr');
	$catp = pluginGetVariable('mapsite', 'catp');
	$catp = '<option value="0" '.($catp==0?'selected':'').'>'.$lang['noa'].'</option><option value="1" '.($catp==1?'selected':'').'>'.$lang['yesa'].'</option>';
	$catp_pr = pluginGetVariable('mapsite', 'catp_pr');
	
	$xt = $twig->loadTemplate($tpath['general.from'].'general.from.tpl');
	$xg = $twig->loadTemplate($tpath['main'].'main.tpl');
	
	$tVars = array(
		'main' 			=> $main,
		'mainp' 		=> $mainp,
		'main_pr' 		=> $main_pr,
		'main_p_pr' 	=> $main_p_pr,
		'news' 			=> $news,
		'news_pr' 		=> $news_pr,
		'stat' 			=> $stat,
		'stat_pr' 		=> $stat_pr,
		'cat' 			=> $cat,
		'cat_pr' 		=> $cat_pr,
		'catp' 			=> $catp,
		'catp_pr' 		=> $catp_pr,
	);
	
	$filemap = $_SERVER['DOCUMENT_ROOT'] . '/uploads/sitemap.xml';

	if(!file_exists($filemap)){ 
		$map_dates = '<div class="stickers stickers-info stickers-styled-left">'.$lang['mapsite']['no_mapsite'].'</div>';
	}else{ 
		//$map_date = date('d.m.Y H:i', filectime($filemap));
		$map_dates = '<div class="stickers stickers-success stickers-styled-left"><b>'.$lang['mapsite']['cr_mapsite'].'</b> '.date('d.m.Y H:i', filemtime($filemap)).'<br>'.$lang['mapsite']['url_mapsite'].'</div>';
	}

	$tVars = array(
		'global' 	=> $lang['mapsite']['common'],
		'map_dates' => $map_dates,
		'header' 	=> '<i class="fa fa-exclamation-circle"></i> <a href="?mod=extra-config&plugin=mapsite&action=about">'.$lang['mapsite']['about'].'</a>',
		'entries' 	=> $xt->render($tVars)
	);
	
	print $xg->render($tVars);
}
