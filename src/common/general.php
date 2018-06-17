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

function getLink($id, $href, $text)
{
    return "<li id='$id'><a href='$href'>$text</a></li>";
}

ini_set('session.gc_maxlifetime', 3600);
if_session_starter();

require 'db_connection.php';
