<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
/*�з� ���̺� ��������*/

$sql= "SELECT * FROM category;";
$data = mysql_query($sql);


/*�з�*/
/*print_r($data[0]);
/*���Ǹ�*/
/*print_r($data[1]);*/
?>
