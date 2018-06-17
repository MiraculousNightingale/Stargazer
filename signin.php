<?php

require 'src/common/general.php';

if (isset($_POST['entry-btn'])) {

    $username = mysqli_real_escape_string($db, $_POST['login_field']);
    $password = mysqli_real_escape_string($db, $_POST['password_field']);

    $query = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


    // If result matched $myusername and $mypassword, table row must be 1 row
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $row['email'];
        $_SESSION['planet'] = $row['planet'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['street'] = $row['street'];
        $_SESSION['role'] = $row['role'];

        $_SESSION['logged_in'] = true;
        header('location: index.php');
    }
}
?>

<html lang="en">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/signin.css">
<link rel="stylesheet" type="text/css" href="css/logbox.css">
<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Stargazer</title>
</head>
<body>

<div class="log-box">
</div>
<div class="content-holder">
    <div class="stargazer-hdr">StarGazer</div>
    <div class="signin-holder clearfix">
        <form method="post" >
            <h1>Welcome, please Sign In.</h1>
            <div class="inputs_box">
                <input name="login_field" type="text" placeholder="Username" class="signin-input">
                <input name="password_field" type="password" placeholder="Password" class="signin-input">
            </div>
            <input type="submit" name="entry-btn" value="Sign In" class="submit-btn">
        </form>
        <div class="signup-holder">
<!--            <span>or, register yourself:</span>-->
            <a class="go-back-btn" href="signup.php">
                <div class="go-back-btn-overlay">Sign Up</div>
                Sign Up
            </a>
        </div>
        <!--    <a href="register_page.php">Register yourself.</a>-->
    </div>
</div>

</body>
</html>
