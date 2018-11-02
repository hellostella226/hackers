<?php

    include_once 'DBconfig.php';

/*    $sql= "SELECT userId FROM member WHERE userId= '".$_POST['userId']."'";*/
    $sql= "INSERT INTO member (userName,userId,userPw,email,phone,tel,address1,address2,address3,sendSms,sendMail) values ('".$_POST['userName']."','".$_POST['userId']."','".$_POST['userPw']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['tel']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['address3']."','".$_POST['sendSms']."','".$_POST['sendMail']."')";
    $result = mysql_query($sql);

    Header("Location:/view/member/complete.php");

/*    echo $data['userId'];*/
    exit;




    //    while($row = mysqli_character_set_name($result)){
//        echo $row['userId'];
//
//        mysqli_close($con);
//    }

?>