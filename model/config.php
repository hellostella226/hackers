<?php

    include_once 'DBconfig.php';

    $sql= "SELECT userId FROM member WHERE userId= '".$_POST['userId']."'";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);


    echo $data['userId'];
    exit;



    //    while($row = mysqli_character_set_name($result)){
//        echo $row['userId'];
//
//        mysqli_close($con);
//    }

?>