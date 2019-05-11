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
    $insert = $association->insert();
    $resp["code"]  = $insert[0];
    $resp["content"]  = $insert[1];
//    $array = [
//        "name" => $_POST["nom_asso"],
//        "file" => $_FILES,
//    ];
//    $folder = new Folder($array) ;
//    $truc = SAVE_DOC_PATH."/".$_POST["nom_asso"] ;
////    wp_mkdir_p(SAVE_DOC_PATH."/".$_POST["nom_asso"]);
//    $name = LUGIN_URL."/asso/save/".$_POST["nom_asso"]."/".$_FILES["statut"]["name"];
//    $folder = new Folder($array);
//    $resp["content"] = $folder->save() ;
//    $dest = SAVE_DOC_PATH."/save/".$_POST["nom_asso"]."/".$_FILES["statut"]["name"];
//    $resp["content"] = move_uploaded_file($_FILES["statut"]["tmp_name"] , $dest);
    return rest_ensure_response($resp);
}