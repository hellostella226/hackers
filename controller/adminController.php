<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
?>
<?php

    switch ($mode) {

        case "list" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/index.php' >";
            break;

        case "write" :

            echo"<meta http-equiv='refresh' content='0; url=/view/admin/writeLec.php'>";
            break;

        case "updateLecture" :

            echo "<meta http-equiv='refresh' content='0; url=/view/admin/updateLec.php?lecNo=".$_GET['lecNo']."'>";


    }