<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
$userName = iconv("UTF-8", "CP949", rawurldecode(($name)));
$phone = $phone1 . '-' . $phone2 . '-' . $phone3;


//�Է¹��� �̸��� ���Ϸ� ���� ������
$sql= "SELECT userId, userName, phone FROM member WHERE
 userName = '".$userName."'and
 phone = '".$phone."' and 
 userId = '".$id."' ";

$result = mysql_query($sql);
$resultSets = mysql_fetch_array($result);

?>