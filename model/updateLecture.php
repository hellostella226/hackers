<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
$lecNo = $_GET['lecNo'];

$sql= "SELECT * FROM lecture WHERE lecNo= '".$lecNo."'";
$data = mysql_query($sql);
$resultUp = mysql_fetch_array($data);

?>
