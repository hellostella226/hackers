<?php
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
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
$getMail = mysql_fetch_array($getMail);

print_r($getMail[0]);
?>
