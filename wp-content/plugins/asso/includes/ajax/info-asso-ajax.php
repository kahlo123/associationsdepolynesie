<?php
function add_script()
{
    wp_register_script('test-js123',
        PLUGIN_URL . '/asso/public/js/info-asso.js',
        "jquery",
        "1.0");


    wp_localize_script(
        "test-js123",
        'ajax_object',
        [
            'ajax_route' => site_url('/wp-json/'.API_VERSION.'/asso/info/add')
        ]
    );
    wp_enqueue_script('test-js123');
}
add_action( 'admin_enqueue_scripts', 'add_script' );