<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 5/8/18
 * Time: 1:46 PM
 */
?>
<?php

require 'src/index_action.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stargazer System</title>
</head>
<body>
<header>
    <ul class="header-menu">
        <li><a href="index.php">Home</a></li>
        <?php echo $profile_button; ?>
        <?php echo $state_button; ?>
    </ul>
</header>
    <div class="menu">
    <!--    <div class="left-menu">-->
    <!--        <span>Welcome</span>-->
    <div class="leftRighter" id="leftRighter"></div>
            <ul class="tab-list menu-summoner" id='menu'>
                <li><a id="tab1" data="src/ajax/tab.php/?tab=info">About Us</a></li>
                <li><a id="tab4" data="src/ajax/tab.php/?tab=news">News Feed</a></li>
                <li><a id="tab2" data="src/ajax/tab.php/?tab=gaze">Gaze'Em</a></li>
                <li><a id="tab3" data="star_map.php">Star Map</a></li>
            </ul>
    <!--    </div>-->
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

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/logbox.css">
<link rel="stylesheet" href="css/about_info.css">
<link rel="stylesheet" href="lib/jquery-ui.min.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/starmap.css">

<script src="lib/jquery-3.3.1.min.js"></script>
<script src="lib/jquery-ui.min.js"></script>
<script src="js/custom-lib.js"></script>
<script src="js/index.js"></script>
