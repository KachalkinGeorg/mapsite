<?php

// Protect against hack attempts
if (!defined('NGCMS')) die ('HAL');

pluginsLoadConfig();

LoadPluginLang('mapsite', 'config', '', '', '#');
// Load library
include_once(root . "/plugins/mapsite/lib/common.php");

function plugin_mapsite_install($action)
{global $lang;

    // Apply requested action
    switch ($action) {
        case 'confirm':
            generate_install_page('mapsite', $lang['mapsite']['install']);
            break;
        case 'autoapply':
        case 'apply':
			plugin_mark_installed('mapsite');
			create_mapsite_urls();
			
			
            $params = array(
                'main_pr' 		=> '1.0',
				'main_p_pr' 	=> '0.9',
				'cat_pr' 		=> '0.7',
				'catp_pr' 		=> '0.7',
				'news_pr' 		=> '0.6',
				'stat_pr' 		=> '0.3',
            );
            foreach ($params as $k => $v) {
                extra_set_param('mapsite', $k, $v);
            }

            extra_commit_changes();
			
			break;

    }

    return true;
}
