<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/10/18
 * Time: 6:21 PM
 */

function if_session_starter()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function getLink($id,$href,$text){
    if($id=='login-btn'){
        return "<li id='$id'><a href='$href'>$text</a></li>";

    }
    return "<li id='$id'><a href='$href'>$text</a></li>";
}

ini_set('session.gc_maxlifetime', 3600);
if_session_starter();

require 'db_connect.php';

