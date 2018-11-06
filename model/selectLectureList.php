<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>
<?php

$sql= "SELECT * FROM lecture ORDER BY lecNo DESC limit 5;";

$result = mysql_query($sql);
?>
