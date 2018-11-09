<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php

$sql= "SELECT * FROM lecture ORDER BY lecNo DESC limit 5;";

$result = mysql_query($sql);
?>
