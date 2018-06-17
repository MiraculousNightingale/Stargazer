<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 3/30/18
 * Time: 9:13 AM
 */

// Sign In Page Code
if (isset($_POST['entry-btn'])) {

    $_SESSION['username'] = $_POST['login_field'];
    $_SESSION['password'] = $_POST['password_field'];

    header("location: profile.php");
}

write_log("Currently active sessions: " . count(glob(session_save_path() . '/*')));
write_log("User: " . $_SESSION['username']);
write_log("Pass: " . $_SESSION['password']);

