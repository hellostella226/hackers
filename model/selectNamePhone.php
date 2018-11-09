<?php
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
$name = iconv("UTF-8", "CP949", rawurldecode(($_POST['userName'])));
$phone = $_POST['phone'];
?>

<?php
//입력받은 이름과 메일로 값을 가져옴
$getPhone= "SELECT userId, userName, phone FROM memberController.php WHERE
userName = '$name' and
phone = '$phone' ";

$getPhone = mysql_query($getPhone);
$getPhone = mysql_fetch_array($getPhone);

print_r($getPhone[0]);
?>
