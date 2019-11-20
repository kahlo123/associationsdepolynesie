<?php

class OfficeController
{
    public function __construct(){
        add_menu_page('Listes des bureaux','Bureau','manage_options','office','info_asso_view','dashicons-networking');
        add_submenu_page('office','Toutes les informations','Liste des bureaux','manage_options','office');
        add_submenu_page('office','Ajouter','Ajouter','manage_options','office_add','accounting_view');
    }

    private function office_view(){
        include __DIR__."/app/view/office.php";
    }
}