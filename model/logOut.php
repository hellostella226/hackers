<?php
session_start();
?>

<?php
include './DBconfig.php';
?>

<?php

$token = $_SESSION['token'];
$getId = $_SESSION['userId'];


//���ǿ� ��ϵ� ��ū �ı�

/*$token = 0;*/

//���ǿ� ��ϵ� ���̵� �ı�

/*$getId = 0;*/



//�����ͺ��̽����� ��ū �ʱ�ȭ

$tokenKill = "UPDATE member SET token = 0 WHERE userId = '$getId'";


$tokenKill = mysql_query($tokenKill);

session_destroy();
?>
<!--<script>alert("logout token value is: "<?php /*$token */?>)</script>-->
<meta http-equiv="refresh" content="0; url=/index.php" />;
