<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 5/8/18
 * Time: 1:46 PM
 */
?>
<?php

require 'source/index_action.php';

?>

<!DOCTYPE html>
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
<div class="menu-summoner">
    <div class="left-menu">
        <span>Welcome to Stargazer</span>
        <ul class="tab-list">
            <li><a id="tab1" data="source/tab.php/?tab=info">About Us</a></li>
            <li><a id="tab4" data="source/tab.php/?tab=news">News Feed</a></li>
            <li><a id="tab2" data="source/tab.php/?tab=gaze">Gaze'Em</a></li>
            <li><a id="tab3" data="star_map.php">Star Map</a></li>
        </ul>
    </div>
</div>
<div class="page-wrap">
</div>
<div class="general-container">

    <div class="main-container" id="data">
        <!--Here goes all the info in a form of containers-->

    </div>

</div>

</body>
</html>

<link rel="stylesheet" href="stylesheets/reset.css">
<link rel="stylesheet" href="stylesheets/index.css">
<link rel="stylesheet" type="text/css" href="stylesheets/logbox.css">
<link rel="stylesheet" href="stylesheets/about_info.css">
<link rel="stylesheet" href="lib/jquery-ui.min.css">
<link rel="stylesheet" href="stylesheets/table.css">
<link rel="stylesheet" href="stylesheets/starmap_style.css">

<script src="lib/jquery-3.3.1.min.js"></script>
<script src="lib/jquery-ui.min.js"></script>
<script src="js/custom-lib.js"></script>
<script src="js/index.js"></script>
