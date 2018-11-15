<?php

include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';

$password = $_POST['userPw'];
$password_hash = hash("sha256", $password);
/*echo "암호화 전 : ".$password."<br/>";
echo "암호화 후 : ".$password_hash."<br/>";*/

$userPw = strtoupper($password_hash);

$address2 = iconv("utf-8", "euc-kr", $address2);
$address3 = iconv("utf-8", "euc-kr", $address3);


    $sql= "UPDATE
    memberController.php
    
    SET
    
    userPw = '".$userPw."' ,
    email = '".$email."' , 
    phone = '".$phone."',
    tel = '".$tel."',
    address1 = '".$address1."',
    address2 = '".$address2."' ,
    address3 = '".$address3."',
    sendSms = '".$sendSms."',
    sendMail = '".$sendMail."'
    
    WHERE token = '".$_SESSION['token']."' ";

    $result = mysql_query($sql);

?>