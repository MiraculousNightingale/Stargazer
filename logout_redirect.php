<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/10/18
 * Time: 7:11 PM
 */

require 'source/general.php';

if (session_destroy()) {
    header("location: index.php");
}