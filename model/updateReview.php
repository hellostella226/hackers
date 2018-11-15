<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php

$reviewNo = $_POST['reviewNo'];
$userNo = $_SESSION['userNo'];
$userName = $_SESSION['userName'];
$lecNo = $_POST['lecNo'];
$lecNo = $_POST['lecNo'];
$starChk = $_POST['starChk'];
$title = iconv("utf-8", "euc-kr", $_POST['title']);
$content = iconv("utf-8", "euc-kr", $_POST['ir1']);



$sql = "UPDATE review SET

`userNo` = '".$userNo."',
`userName` = '".$userName."', 
`title` = '".$title."',
`content` = '".$content."',
`lecNo` = '".$lecNo."',
starChk ='".$starChk."'

WHERE reviewNo = '".$reviewNo."' ";

$result = mysql_query($sql);

?>
