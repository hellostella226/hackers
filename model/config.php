<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';

    $sql= "SELECT userId FROM member WHERE
            userId= '".$_POST['userId']."'";

    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);


?>