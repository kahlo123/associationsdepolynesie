<?php
/*
Plugin Name: Les associations de polynéssie française
Description: Ensemble d'outils permettant : - Suivre les activités d'une association ; - Facilité les demandes de subvention
Author: DigitalToolbox
Version: 1.0.0
*/

//CONSTANT
define("API_VERSION" , "1.0");
define("PLUGIN_URL" , plugins_url());
define("SAVE_DOC_PATH" , plugin_dir_path(__FILE__) . "/save/");

//require(dirname(__FILE__) . "/../../../wp-load.php");


//Model
include __DIR__."/app/model/association.php";
include __DIR__."/app/model/folder.php";
include __DIR__."/app/model/office.php";
include __DIR__."/app/model/office_member.php";

//Controller


//Ajax
include __DIR__."/includes/ajax/info-asso-ajax.php";
include __DIR__."/includes/ajax/office.php";
//Routes
include __DIR__."/includes/routes/info-asso.php";
include __DIR__."/includes/routes/office.php";


add_action('admin_menu','asso_admin_menu');
register_activation_hook(__FILE__,"set_table");
register_deactivation_hook( __FILE__, 'unset_table' );

function set_table(){
    global $wpdb ;

    $tables = "CREATE TABLE `{$wpdb->prefix}info_asso` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                      `name` varchar(50) DEFAULT NULL,
                      `address` varchar(50) DEFAULT NULL,
                      `pb` varchar(20) DEFAULT NULL,
                      `pc` varchar(20) DEFAULT NULL,
                      `num_tahiti` varchar(20) DEFAULT NULL,
                      `asso_type` varchar(20) DEFAULT NULL,
                      `date_crea` date DEFAULT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

    $tables .= "CREATE TABLE `{$wpdb->prefix}office` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `date_start` date NOT NULL,
                      `date_end` date NOT NULL,
                      `date_crea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

    $tables .= "CREATE TABLE `{$wpdb->prefix}office_member` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `office_id` int(11) NOT NULL,
                      `lastname` varchar(20) NOT NULL,
                      `firstname` varchar(50) NOT NULL,
                      `tel` varchar(20) NOT NULL,
                      `mail` varchar(20) NOT NULL,
                      `dateOfBirth` varchar(20) NOT NULL,
                      `address` varchar(20) NOT NULL,
                      `situation` enum('pr','v-pr','compt','secr','tr') NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

    $tables .= "CREATE TABLE `{$wpdb->prefix}situation` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `name` varchar(20) NOT NULL,
                      `alias` varchar(20) NOT NULL,
                      `definition` longtext NOT NULL,
                      `date_crea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

    $tables .= "CREATE TABLE `{$wpdb->prefix}licensee` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `lastname` varchar(20) NOT NULL,
                      `firstname` varchar(50) NOT NULL,
                      `tel` varchar(20) NOT NULL,
                      `mail` varchar(20) NOT NULL,
                      `dateOfBirth` varchar(20) NOT NULL,
                      `address` varchar(20) NOT NULL,
                      `sport` varchar(20) NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

    $tables .= "CREATE TABLE `{$wpdb->prefix}licensee_period` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `licensee_id` int(11) NOT NULL,
                      `date_start` date NOT NULL,
                      `date_end` date NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($tables);
}

function truncate_table(){
    global $wpdb;

    $wpdb->query( "TRUNCATE TABLE IF EXISTS {$wpdb->prefix}info_asso" );
    $wpdb->query( "TRUNCATE TABLE IF EXISTS {$wpdb->prefix}office" );
    $wpdb->query( "TRUNCATE TABLE IF EXISTS {$wpdb->prefix}office_member" );

}


function unset_table() {
    global $wpdb;

    $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}info_asso" );
    $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}office" );
    $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}office_member" );
    $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}situation" );
    $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}licensee" );
    $wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}licensee_period" );
}


function asso_admin_menu(){
   $list_info =  add_menu_page('Les informations relatives à l\'association','Info association','manage_options','list_info','info_asso_list_view','dashicons-admin-home');
   add_submenu_page('list_info','Information','Informations','manage_options','list_info');
   $add_info = add_submenu_page('list_info','Ajouter des informations','Ajouter','manage_options','add_info','info_asso_add_view');


   $list_office =  add_menu_page('Bureau de l\'association','Bureau','manage_options','list_office','office_list_view','dashicons-admin-home');
   add_submenu_page('list_office','Listes des bureaux','Tous les bureaux','manage_options','list_office');
   $add_office = add_submenu_page('list_office','Ajouter un bureau','Ajouter','manage_options','office','office_add_view');


    add_menu_page('Liste des licenciés' , 'Licencié','manage_options','list_licensee','licensee_list_view','dashicons-admin-home');
    add_submenu_page('list_licensee','Liste des licenciés','Tous les bureaux','manage_options','list_licensee');
    add_submenu_page('list_licensee','Ajouter un liencié','Ajouter','manage_options','add_licensee','licensee_add_view');


//    add_submenu_page('office','Ajouter un bureau','Ajouter un bureau','manage_options','add_office','add_office_view');
//
//    add_submenu_page('asso_plugin','Comptabilité','Comptabilité','manage_options','accounting','accounting_view');
//    add_submenu_page('asso_plugin','Traitement des subventions','Subvention','manage_options','grant','grant_view');
//    add_submenu_page('asso_plugin','Traitement des documents','Documents','manage_options','document','document_view');
//    add_submenu_page('asso_plugin','Evènement','Evènement','manage_options','event','event_view');
//    add_submenu_page('asso_plugin','Liste des adhérents','Adherent','manage_options','member','member_view');
//    add_submenu_page('asso_plugin','Liste des licenciés','Licencié','manage_options','licensee','licensee_view');


    // Print script to menu page
    add_action( 'admin_print_scripts-' . $list_info, 'info_script' );
    add_action( 'admin_print_scripts-' . $add_info, 'info_script' );
    add_action( 'admin_print_scripts-' . $list_office, 'office_script' );
    add_action( 'admin_print_scripts-' . $add_office, 'office_script' );
}


//View
function info_asso_list_view(){
    include __DIR__ . "/app/view/info_asso/list.php";
}

function info_asso_add_view(){
    include __DIR__ . "/app/view/info_asso/add.php";
}



function office_list_view(){
    include __DIR__."/app/view/office/list.php";
}

function office_add_view(){
    include __DIR__."/app/view/office/add.php";
}


function licensee_list_view(){
    include __DIR__."/app/view/licensee/list.php";
}

function licensee_add_view(){
    include __DIR__."/app/view/licensee/add.php";
}


//function accounting_view(){
//    include __DIR__."/app/view/accounting.php";
//}
//
//function grant_view(){
//    include __DIR__."/app/view/grant.php";
//}
//
//function document_view(){
//    include __DIR__."/app/view/document.php";
//}
//
//function event_view(){
//    include __DIR__."/app/view/event.php";
//}
//
//function member_view(){
//    include __DIR__."/app/view/member.php";
//}
//