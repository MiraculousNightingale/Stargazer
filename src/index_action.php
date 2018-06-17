<?php

require_once 'common/general.php';
//Session starts

$profile_button = '';
$state_button = '';
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $profile_button = getLink('user-profile-btn', 'profile.php', 'User Profile');
    $state_button = getLink('login-btn', 'logout.php', 'Log Out');
} else {
    $state_button = getLink('login-btn', 'signin.php', 'Log In');

}

