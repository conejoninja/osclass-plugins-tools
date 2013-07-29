<?php

    global $ABS_PATH;
    require_once 'utils.php';

    if( PHP_SAPI==='cli' ) {
        $cli_params = getopt('p:');
        if($cli_params['p']!='') {
            $plugins = array($cli_params['p']);
        } else {

            $plugins = array(
                'adimporter'
                ,'agewarning'
                ,'amazons3'
                ,'autoregister'
                ,'bitcoins'
                ,'breadcrumbs'
                ,'cars_attributes'
                ,'dating_attributes'
                ,'demo_theme'
                ,'digitalgoods'
                ,'extra_feeds'
                ,'facebook'
                ,'google_analytics'
                ,'google_maps'
                ,'jobboard'
                ,'jobs_attributes'
                ,'location_required'
                ,'lopd'
                ,'more_edit'
                ,'multicurrency'
                ,'osc-mobile'
                ,'payment'
                ,'piglatin'
                ,'piwik'
                ,'printpdf'
                ,'products_attributes'
                ,'qrcode'
                ,'realestate_attributes'
                ,'registered_users_only'
                ,'requiredfields'
                ,'rich_edit'
                ,'routes_example'
                ,'simplecache'
                ,'sitemap_generator'
                ,'social_bookmarks'
                ,'theme_languages'
                ,'time_elapsed'
                ,'tor'
                ,'voting'
                ,'watchlist'
                ,'webrupee'
                ,'yandex_maps'
                ,'yandex_metrica'
                ,'youtube'
            );
        }
    }

    $plist = '';
    foreach($plugins as $plugin) {

        system("cd plugin-".$plugin.";git checkout master; echo $?", $rv);
        if($rv!=0) { echo "CRON FAILED"; exit; };

        system("cd plugin-".$plugin.";git pull origin master; echo $?", $rv);
        if($rv!=0) { echo "CRON FAILED"; exit; };

        $pdir = osc_readDir('plugin-'.$plugin);
        $name = str_replace("plugin-".$plugin."/", "", $pdir);
        $content = file_get_contents($pdir."/index.php");

        if( preg_match('|Version:([^\\r\\t\\n]*)|i', $content, $match) ) {
            $version = trim($match[1]);

            $filename = "plugins_".$name."_".$version.".zip";

            //$plist .= '[url=http://static.osclass.og/download/plugins/'.$filename.']'.$name.'[/url]'.PHP_EOL;
            //$plist .= '<a href="http://static.osclass.og/download/plugins/'.$filename.'" >'.$name.'</a>'.PHP_EOL;

            $ABS_PATH = "plugin-".$plugin."/";
            osc_zip_folder($pdir, $filename);
        }

    }

    //echo $plist;




?>
