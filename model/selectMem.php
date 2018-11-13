<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';

$sql= "SELECT * FROM member WHERE
token= '".$_SESSION['token']."'";

$sql2= "SELECT * FROM member WHERE
userId= '".$_SESSION['userId']."'";


$result = mysql_query($sql);
$data = mysql_fetch_array($result);
?>