<?php
/*
Plugin Name: Les associations de polynéssie française
Description: Ensemble d'outils permettant : - Suivre les activités d'une association ; - Facilité les demandes de subvention
Author: DigitalToolbox
Version: 1.0.0
*/

//CONSTANT
define("API_VERSION" , "1.0");
define("PLUGIN_URL" , plugin_dir_url(__FILE__));



//Model

//Controller


//Ajax
include __DIR__."/includes/ajax/info-asso-ajax.php";
//Routes
include __DIR__."/includes/routes/info-asso.php";


add_action('admin_menu','asso_admin_menu');

function asso_admin_menu(){
    add_menu_page('Les informations relatives à l\'association','Info association','manage_options','asso_plugin','info_asso_view','dashicons-admin-home');
    add_submenu_page('asso_plugin','Bureau','Bureau','manage_options','office','office_view');
    add_submenu_page('asso_plugin','Comptabilité','Comptabilité','manage_options','accounting','accounting_view');
    add_submenu_page('asso_plugin','Traitement des subventions','Subvention','manage_options','grant','grant_view');
    add_submenu_page('asso_plugin','Traitement des documents','Documents','manage_options','document','document_view');
    add_submenu_page('asso_plugin','Evènement','Evènement','manage_options','event','event_view');
    add_submenu_page('asso_plugin','Liste des adhérents','Adhérent','manage_options','member','member_view');
}


//View
function info_asso_view(){
    include __DIR__."/app/view/info-asso.php";
//$exist = $wpdb->get_col("DESC {$wpdb->prefix}info_asso", 0);
//print_r($exist);
}

function office_view(){
    include __DIR__."/app/view/office.php";
}

function accounting_view(){
    include __DIR__."/app/view/accounting.php";
}

function grant_view(){
    include __DIR__."/app/view/grant.php";
}

function document_view(){
    include __DIR__."/app/view/document.php";
}

function event_view(){
    include __DIR__."/app/view/event.php";
}

function member_view(){
    include __DIR__."/app/view/member.php";
}