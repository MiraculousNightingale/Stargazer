<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/15/18
 * Time: 6:15 PM
 */

function if_session_starter()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

<<<<<<< HEAD:source/general.php
function getLink($id,$href,$text){
    if($id=='login-btn'){
        return "<li id='$id'><a href='$href'>$text</a></li>";

    }
=======
function getLink($id, $href, $text)
{
>>>>>>> f395c2570295448d6d2152228487c08035f5b650:src/common/general.php
    return "<li id='$id'><a href='$href'>$text</a></li>";
}

ini_set('session.gc_maxlifetime', 3600);
if_session_starter();

require 'db_config.php';
