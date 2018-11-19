<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
$name = iconv("UTF-8", "CP949", rawurldecode(($_POST['userName'])));
$email = $_POST['email'];
?>

<?php
//입력받은 이름과 메일로 값을 가져옴
$getMail= "SELECT userId, userName, email FROM member
WHERE userName = '$name' and
email = '$email' ";


$getMail = mysql_query($getMail);
$resultSets = mysql_fetch_array($getMail);
$resultSets['userId'];
?>
