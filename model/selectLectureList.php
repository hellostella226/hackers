<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php

if(($_GET['cateNo'])) {
    $where .= "WHERE cateNo = '".$_GET['cateNo']."'";
}

$sql= "SELECT * FROM lecture $where ORDER BY lecNo DESC limit 5;";

$result = mysql_query($sql);
?>
