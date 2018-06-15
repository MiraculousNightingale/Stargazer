<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 6/10/18
 * Time: 7:43 PM
 */
?>

<?php

require 'src/feed_action.php';


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stargazer System</title>
</head>
<body>
<header>
    <ul class="header-menu clearfix">
        <li><a href="index.php">Home</a></li>
        <?php echo $profile_button; ?>
        <?php echo $state_button; ?>
    </ul>
</header>

<div class="general-container">

    <div class="main-container" id="data">
        <form method="post" class="feed-form" enctype="multipart/form-data">
            <div class="content-editor">
                <div class="picture-part">
                    <h1>Create a new Message: </h1>
                    <span>Article Picture:</span>
                    <img id="imgPreview" class="article-picture">
                    <input id="imgInput" name="fileToUpload" type="file" onchange="loadFile(event)">
                </div>
                <div class="text-part">
                    <span>Article Header:</span>
                    <input name="article-header" type="text" value="" class="article-header-field">
                    <span>Article Text:</span>
                    <textarea name="article-text" class="article-text-field"></textarea>
                </div>
            </div>
            <div class="btn-holder">
                <input name="push-news" type="submit" value="Push news" class="submit-form-btn">
            </div>
        </form>
    </div>

    <div class="main-container" id="data">

    </div>

</div>

</body>
</html>

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/logbox.css">
<link rel="stylesheet" href="css/about_info.css">
<link rel="stylesheet" href="lib/jquery-ui.min.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/starmap.css">
<link rel="stylesheet" href="css/feed_editor.css">

<script src="lib/jquery-3.3.1.min.js"></script>
<script src="lib/jquery-ui.min.js"></script>
<script src="js/custom-lib.js"></script>
<script src="js/index.js"></script>
<script src="js/feed-editor.js"></script>