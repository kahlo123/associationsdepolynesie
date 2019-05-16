<?php


function api_rest_route_office()
{
    error_log('api_rest_route_office');

    register_rest_route(API_VERSION, '/asso/office/add', array(
            'methods' => 'POST',
            'callback' => 'office_add',
        )
    );
}

add_action('rest_api_init','api_rest_route_office');

function office_add(){
    $resp = [
      "code" => 400,
      "content" => [],
    ];

    $office = new Office($_POST) ;
//    print_r($_POST);
    $resp = $office->insert();
    return rest_ensure_response($resp);

}