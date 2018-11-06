<?php
include_once 'DBconfig.php';

$lecNo = $_GET['lecNo'];

$sql= "SELECT * FROM lecture WHERE lecNo= '".$lecNo."'";
$data = mysql_query($sql);
$resultUp = mysql_fetch_array($data);

?>
