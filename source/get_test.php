<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 4/2/18
 * Time: 3:18 PM
 */

if(isset($_GET['alert'])){
    $msg=$_GET['alert'];
    echo '
    <script language="JavaScript">
    alert("';
    echo $msg;
    echo '");
    </script>
        ';
}
//if(isset($_GET['']))