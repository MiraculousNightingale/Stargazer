<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/14/18
 * Time: 9:09 PM
 */

require 'common/general.php';

if ($_SESSION['role'] != 'admin') {
    header('location: index.php');
}

$profile_button = '';
$state_button = '';
if ($_SESSION['logged_in'] == false) {
//    $profile_button = getLink('welcome-btn','','STARGAZER');
    $state_button = getLink('login-btn', 'signin.php', 'Log In');
} else {
    $profile_button = getLink('user-profile-btn', 'profile.php', 'User Profile');
    $state_button = getLink('login-btn', 'logout.php', 'Log Out');
}

function getImage()
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $mime="mime";
    if ($check !== false) {
        echo "<script> alert('File is an image - ' . $check[$mime] . '.')</script>";
        $uploadOk = 1;
    } else {
        echo "<script> alert('File is not an image.')</script>";
        $uploadOk = 0;
    }
    // Check if file already exists
//    if (file_exists($target_file)) {
//        echo "<script> alert('Sorry, file already exists.')</script>";
//        $uploadOk = 0;
//    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<script> alert('Sorry, your file is too large.')</script>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script> alert('Sorry, your file was not uploaded.'); </script>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            return basename($_FILES["fileToUpload"]["name"]);
        } else {
            echo "<script> alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}

if (isset($_POST['push-news'])) {

    if ($_POST['article-text'] != null && $_POST['article-header'] != null) {

        $header = $_POST['article-header'];
        $text = $_POST['article-text'];
        $img = getImage();
        $date=date("Y.m.d");
        $query_push_news = "INSERT INTO `news` (title, text, image, `date`) 
        VALUES ('$header','$text','$img','$date')";
        $db->query($query_push_news);
        echo "<script> alert('News have been pushed successfully.');</script>";
//        header("location: index.php");

    }
}
