<?php

    include_once 'DBconfig.php';

    $sql= "SELECT userId FROM member WHERE
            userId= '".$_POST['userId']."'";

    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);


    echo $data['userId'];
    exit;


?>