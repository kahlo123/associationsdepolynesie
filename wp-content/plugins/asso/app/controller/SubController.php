<?php
class SubController
{
    public function __construct(){
        add_menu_page('Les subventions de l\'association ','Subventions','manage_options','sub','info_asso_view','dashicons-heart');
        add_submenu_page('sub','Toutes les informations','Liste des subventions','manage_options','sub');
        add_submenu_page('sub','Ajouter','Ajouter','manage_options','sub_add','accounting_view');
    }
}