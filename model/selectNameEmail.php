<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
$name = iconv("UTF-8", "CP949", rawurldecode(($_POST['userName'])));
$email = $_POST['email'];
?>

<?php
//�Է¹��� �̸��� ���Ϸ� ���� ������
$getMail= "SELECT userId, userName, email FROM member
WHERE userName = '$name' and
email = '$email' ";


$getMail = mysql_query($getMail);
$resultSets = mysql_fetch_array($getMail);
$resultSets['userId'];
?>
