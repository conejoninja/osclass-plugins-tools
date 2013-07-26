<?php

    
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

    foreach($plugins as $plugin) {

        system("git clone git@github.com:osclass/plugin-".$plugin."; echo $?", $rv);
        if($rv!=0) { echo "CRON FAILED"; exit; };


    }





?>
