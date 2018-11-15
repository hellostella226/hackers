<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php


$userNo = $_SESSION['userNo'];
$userName = $_SESSION['userName'];
$lecNo = $_POST['lecNo'];
$starChk = $_POST['starChk'];
$title = iconv("utf-8", "euc-kr", $_POST['title']);
$content = iconv("utf-8", "euc-kr", $_POST['ir1']);


$sql = "INSERT INTO review (`userNo`,`userName`,`title`,`content`,`lecNo`,`starChk`)
        VALUES (
        '".$userNo."',
        '".$userName."',
        '".$title."',
        '".$content."',
        '".$lecNo."',
        '".$starChk."'
        )";

$result = mysql_query($sql);

?>

