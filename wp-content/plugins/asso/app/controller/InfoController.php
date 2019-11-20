<?php

class InfoController
{
    public function __construct(){
            add_menu_page('Les informations relatives à l\'association','Informations','manage_options','info_asso','info_asso_view','dashicons-admin-home');
            add_submenu_page('info_asso','Toutes les informations','Liste des informations','manage_options','info_asso');
            add_submenu_page('info_asso','Ajouter','Ajouter','manage_options','info_asso_add','accounting_view');
    }
}