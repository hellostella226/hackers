<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';

$password = $_POST['userPw'];
$password_hash = hash("sha256", $password);

$userPw = strtoupper($password_hash);


    $sql= "INSERT INTO member (userName,userId,userPw,email,phone,tel,address1,address2,address3,sendSms,sendMail) values
 ('".$userName."',
 '".$userId."',
'".$userPw."',
'".$email."',
'".$phone."',
'".$tel."',
'".$address1."',
'".$address2."',
'".$address3."',
'".$sendSms."',
'".$sendMail."')";

   $result = mysql_query($sql);

   echo "<meta http-equiv='refresh' content='0; url=/controller/memberController.php?mode=logIn'>";

?>