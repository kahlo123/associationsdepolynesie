<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 19/11/2019
 * Time: 14:00
 */

class AdherentController
{
    public function __construct(){
    add_menu_page('Liste des adhérents','Adhérents','manage_options','adherent','info_asso_view','dashicons-id-alt');
    }
}