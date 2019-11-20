<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 19/11/2019
 * Time: 13:58
 */

class DocumentController
{
    public function __construct(){
    add_menu_page('Liste des documents','Documents','manage_options','doc','info_asso_view','dashicons-portfolio');

    }
}