<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
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
