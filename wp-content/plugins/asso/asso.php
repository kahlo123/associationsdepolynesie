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
//Controller
include __DIR__ . "/app/controller/InfoController.php";
include __DIR__ . "/app/controller/OfficeController.php";
include __DIR__ . "/app/controller/SubController.php";
include __DIR__ . "/app/controller/ComptaController.php";
include __DIR__ . "/app/controller/DocumentController.php";
include __DIR__ . "/app/controller/EventController.php";
include __DIR__ . "/app/controller/AdherentController.php";

add_action('admin_menu','asso_admin_menu');

function asso_admin_menu(){
    $info = new InfoController();
    $sub = new SubController() ;
    $office = new OfficeController();
    $compta = new ComptaController();
    $event = new EventController();
    $doc = new DocumentController();
    $adherent = new AdherentController();

//    add_menu_page('La comptabilité de l\'association','Comptabilité','manage_options','compta','info_asso_view','dashicons-chart-pie');
//    add_menu_page('Les évènements de l\'association','Evènements','manage_options','event','info_asso_view','dashicons-calendar-alt');
//    add_menu_page('Liste des documents','Documents','manage_options','doc','info_asso_view','dashicons-portfolio');
//    add_menu_page('Liste des adhérents','Adhérents','Liste des adhérents','Adhérent','manage_options','adherent','info_asso_view','dashicons-id-alt');
//
//    ///
//    ///
//    ///
//    add_submenu_page('compta','Toutes les informations','Informations comptable','manage_options','compta');
//    add_submenu_page('compta','Ajouter','Ajouter','manage_options','compta_add','accounting_view');
//    ///
//    add_submenu_page('event','Toutes les informations','Liste des évènements','manage_options','event');
//    add_submenu_page('event','Ajouter','Ajouter','manage_options','event_add','accounting_view');
//    ///
//    add_submenu_page('doc','Toutes les informations','Liste des documents','manage_options','doc');
//    add_submenu_page('doc','Ajouter','Ajouter','manage_options','doc_add','accounting_view');
//    //
//    add_management_page('Some page title', 'Title in the menu', 'install_plugins', 'info_asso12', 'accounting_view', '');
}


//View
function info_asso_view(){
    include __DIR__."/app/view/info.php";
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