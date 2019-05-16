<?php
function info_script()
{
    $handle = "info_asso" ;
    wp_register_script($handle,
        PLUGIN_URL . '/asso/public/js/info-asso.js',
        "jquery",
        "1.0");


    wp_localize_script(
        $handle,
        'ajax_object',
        [
            'ajaxinfo' => site_url('/wp-json/'.API_VERSION.'/asso/info/add'),
        ]
    );
    wp_enqueue_script($handle);
}