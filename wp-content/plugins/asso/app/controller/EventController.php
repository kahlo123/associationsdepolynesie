<?php
/**
 * Created by PhpStorm.
 * User: Kyle
 * Date: 19/11/2019
 * Time: 13:59
 */

class EventController
{
    public function __construct(){
    add_menu_page('Les évènements de l\'association','Evènements','manage_options','event','info_asso_view','dashicons-calendar-alt');

    }
}