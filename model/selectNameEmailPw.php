<?php
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
$name = iconv("UTF-8", "CP949", rawurldecode(($_POST['userName'])));
$id = $_POST['userId'];
$email = $_POST['email'];
$userId = $_POST['userId']
?>

<?php
//입력받은 이름과 메일로 값을 가져옴
$getMail= "SELECT userId, userName, email FROM memberController.php WHERE userName = '$name' and email = '$email' and userId = '$userId'";
$getMail = mysql_query($getMail);
$getMail = mysql_fetch_array($getMail);

print_r($getMail[0]);
?>
