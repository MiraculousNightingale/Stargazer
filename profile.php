<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 4/1/18
 * Time: 6:35 PM
 */
?>

<?php

require 'source/general.php';

write_log("Currently active sessions: " . count(glob(session_save_path() . '/*')));
write_log("User: " . $_SESSION['username']);
write_log("Pass: " . $_SESSION['password']);

//    Changes Saved Check
if ($_SESSION['changes_saved']) {
    write_log("Changes saved.");
}

if (isset($_POST['save-changes'])) {

//    Save Changes
    $username = $_SESSION['username'];
    $password = $_POST['password-field'];
    $email = $_POST['email-field'];
    $planet = $_POST['planet-field'];
    $country = $_POST['country-field'];
    $street = $_POST['street-field'];

    $query_change_params = "UPDATE `user` SET `password` = '$password', `email` = '$email', `planet` = '$planet', 
    `country` = '$country', `street` = '$street' WHERE `user` . `username` = '$username';";

    $db->query($query_change_params);

//    Update Session Data
    $query_select_current_user = "SELECT * FROM user WHERE username = '$username';";
    $row = $db->query($query_select_current_user)->fetch_assoc();
    $_SESSION['password'] = $row['password'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['planet'] = $row['planet'];
    $_SESSION['country'] = $row['country'];
    $_SESSION['street'] = $row['street'];

    $_SESSION['changes_saved'] = true;
}

if($_SESSION['role']=='admin'){
    $control_news_button="<a class='info-form-btn' href='feed_editor.php'>Feed Editor</a>";
}
?>

<html lang="en">
<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
<link rel="stylesheet" type="text/css" href="stylesheets/main_style.css">
<link rel="stylesheet" type="text/css" href="stylesheets/logbox.css">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="log-box">
    <?php echo $log ?>
</div>

<div class="info-holder">
    <form method="post" class="info-form">
        <h1>Welcome to your Profile</h1>
        <span>Username:</span>
        <input name="username-field" type="text" disabled value="<?php echo $_SESSION['username'] ?>"
               class="text-field">
        <span>Password:</span>
        <input name="password-field" type="text" value="<?php echo $_SESSION['password'] ?>" class="text-field">
        <span>Additional data:</span>
        <span>Email to allow us send you some shitty spam</span>
        <input name="email-field" type="email" value="<?php echo $_SESSION['email'] ?>" class="text-field">
        <span>Planet</span>
        <input name="planet-field" type="text" value="<?php echo $_SESSION['planet'] ?>" class="text-field">
        <span>Country</span>
        <input name="country-field" type="text" value="<?php echo $_SESSION['country'] ?>" class="text-field">
        <span>Street</span>
        <input name="street-field" type="text" value="<?php echo $_SESSION['street'] ?>" class="text-field">
        <div class="btn-holder">
            <input name="save-changes" type="submit" value="Save" class="info-form-btn">
            <?php echo $control_news_button ?>
        </div>
    </form>
</div>
</body>
</html>