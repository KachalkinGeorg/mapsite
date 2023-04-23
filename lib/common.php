<?php

//
// Class for managing mapsite
class mapsiteFilter
{
	//var $output = $_SERVER['DOCUMENT_ROOT']. "/uploads/sitemap.xml";
    // Action executed when page is showed
    function onShow(&$output)
    {
    }
}

function create_mapsite_urls()
{

    $ULIB = new urlLibrary();
    $ULIB->loadConfig();
    $ULIB->registerCommand('mapsite', '',
        array(
            'vars' => array(),
            'descr' => array('russian' => 'Карта сайта'),
        )
    );
    $ULIB->saveConfig();
    $UHANDLER = new urlHandler();
    $UHANDLER->loadConfig();
    $UHANDLER->registerHandler(0,
        array(
            'pluginName' => 'mapsite',
            'handlerName' => '',
            'flagPrimary' => true,
            'flagFailContinue' => false,
            'flagDisabled' => false,
            'rstyle' => array(
                'rcmd' => '/sitemap.xml',
                'regex' => '#^/sitemap.xml$#',
                'regexMap' =>
                    array(),
                'reqCheck' =>
                    array(),
                'setVars' =>
                    array(),
                'genrMAP' =>
                    array(
                        0 =>
                            array(
                                0 => 0,
                                1 => '/sitemap.xml',
                                2 => 0,
                            ),
                    ),
            ),
        )
    );
    $UHANDLER->saveConfig();
}

function remove_mapsite_urls()
{
    $ULIB = new urlLibrary();
    $ULIB->loadConfig();
    $ULIB->removeCommand('mapsite', '');
    $ULIB->saveConfig();
    $UHANDLER = new urlHandler();
    $UHANDLER->loadConfig();
    $UHANDLER->removePluginHandlers('mapsite', '');
    $UHANDLER->saveConfig();
}
