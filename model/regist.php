<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';

$password = $_POST['userPw'];
$password_hash = hash("sha256", $password);
$userPw = strtoupper($password_hash);

$userName = iconv("utf-8", "euc-kr", $userName);
$address1 = iconv("utf-8", "euc-kr", $address1);
$address2 = iconv("utf-8", "euc-kr", $address2);
$address3 = iconv("utf-8", "euc-kr", $address3);

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



?>