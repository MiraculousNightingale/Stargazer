<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 3/30/18
 * Time: 9:37 AM
 */
?>

<?php

require 'source/general.php';

if (isset($_POST['signup'])) {
    if ($_POST['username-field'] != null && $_POST['password-field'] != null) {

        $_SESSION['account-created'] = true;

        $username = $_POST['username-field'];
        $password = $_POST['password-field'];
        $email = $_POST['email-field'];
        $planet = $_POST['planet-field'];
        $country = $_POST['country-field'];
        $street = $_POST['street-field'];

        $query_create_account = "INSERT INTO `user` (username, password, email, planet, country, street) 
        VALUES ('$username', '$password', '$email', '$planet', '$country', '$street');";
        $db->query($query_create_account);

        header("location: signin.php");

    } else {
        echo '
    <script language="JavaScript">
    alert("You havent filled necessary fields.");
    </script>
        ';
    }
}

?>

<html lang="en">
<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
<link rel="stylesheet" type="text/css" href="stylesheets/signup_style.css">
<link rel="stylesheet" type="text/css" href="stylesheets/logbox.css">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<div class="log-box">
    <?php echo $log; ?>
</div>

<div class="info-holder">
    <form method="post" class="info-form">
        <h1>Please, fill in the fields</h1>
        <h2>the ones with * are vital</h2>
        <span>*Username:</span>
        <input name="username-field" type="text" value="" class="text-field">
        <span>*Password:</span>
        <input name="password-field" type="password" value="" class="text-field">
        <span>Additional data:</span>
        <span>Email to allow us send you some shitty spam</span>
        <input name="email-field" type="email" value="" class="text-field">
        <span>Planet</span>
        <input name="planet-field" type="text" value="" class="text-field">
        <span>Country</span>
        <input name="country-field" type="text" value="" class="text-field">
        <span>Street</span>
        <input name="street-field" type="text" value="" class="text-field">
        <div class="btn-holder">
            <input name="signup" type="submit" value="Sign Up" class="info-form-btn">
        </div>
    </form>
</div>

</body>
</html>
