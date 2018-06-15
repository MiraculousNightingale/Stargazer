<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/10/18
 * Time: 6:20 PM
 */

require 'general.php';
//Session starts

$profile_button = '';
$state_button = '';
if ($_SESSION['logged_in'] == false) {
//    $profile_button = getLink('welcome-btn','','STARGAZER');
    $state_button = getLink('login-btn','signin.php', 'Log In');
} else {
    $profile_button = getLink('user-profile-btn','profile.php', 'User Profile');
    $state_button = getLink('login-btn','logout_redirect.php', 'Log Out');
}