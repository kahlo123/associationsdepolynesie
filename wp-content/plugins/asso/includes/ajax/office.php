<?php
function office_script()
{
    $handle = "office" ;
    wp_register_script($handle,
        PLUGIN_URL . '/asso/public/js/office.js',
        "jquery",
        "1.0");


    wp_localize_script(
        $handle,
        'ajax_object',
        [
            'ajaxoffice' => site_url('/wp-json/'.API_VERSION.'/asso/office/add'),
        ]
    );
    wp_enqueue_script($handle);
}