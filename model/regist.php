<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';

$password = $_POST['userPw'];
$password_hash = hash("sha256", $password);

/*echo "암호화 전 : ".$password."<br/>";
echo "암호화 후 : ".$password_hash."<br/>";*/

$userPw = strtoupper($password_hash);



/*    $sql= "SELECT userId FROM memberController.php WHERE userId= '".$_POST['userId']."'";*/
    $sql= "INSERT INTO member (userName,userId,userPw,email,phone,tel,address1,address2,address3,sendSms,sendMail) values
 ('".$_POST['userName']."',
 '".$_POST['userId']."',
 '".$userPw."','".$_POST['email']."',
 '".$_POST['phone']."',
 '".$_POST['tel']."',
 '".$_POST['address1']."',
 '".$_POST['address2']."',
 '".$_POST['address3']."',
 '".$_POST['sendSms']."',
 '".$_POST['sendMail']."')";


    $result = mysql_query($sql);

    Header("Location:/view/memberController.php/complete.php");

/*    echo $data['userId'];*/
    exit;




    //    while($row = mysqli_character_set_name($result)){
//        echo $row['userId'];
//
//        mysqli_close($con);
//    }

?>