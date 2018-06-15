<?php

require_once 'common/general.php';
//Session starts

$profile_button = '';
$state_button = '';
if ($_SESSION['logged_in'] == false) {
$state_button = getLink('login-btn', 'signin.php', 'Log In');
} else {
    $profile_button = getLink('user-profile-btn','profile.php', 'User Profile');
    $state_button = getLink('login-btn','logout.php', 'Log Out');
}

