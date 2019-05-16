<?php


function api_rest_route()
{
    error_log('api_rest_route');

    register_rest_route(API_VERSION, '/asso/info/add', array(
            'methods' => 'POST',
            'callback' => 'account_add',
        )
    );
}

add_action('rest_api_init','api_rest_route');


function account_add(){
    $resp = [
        'code' => 400,
        'content' => []
    ];

    $association = new Association($_POST,$_FILES);
    $resp = $association->insert();
    return rest_ensure_response($resp);
}