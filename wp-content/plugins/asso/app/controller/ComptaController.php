<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 19/11/2019
 * Time: 13:58
 */

class ComptaController
{
    public function __construct(){
    add_menu_page('La comptabilité de l\'association','Comptabilité','manage_options','compta','accounting_view','dashicons-chart-pie');
    add_submenu_page('compta','Toutes les informations','Informations comptable','manage_options','compta');
    add_submenu_page('compta','Ajouter','Ajouter','manage_options','compta_add','accounting_view');
    }
}