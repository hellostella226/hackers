<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php

$token = $_SESSION['token'];
$getId = $_SESSION['userId'];


/*$token = 0;*/

//세션에 등록된 아이디 파기

/*$getId = 0;*/



//데이터베이스에서 토큰 초기화

$tokenKill = "UPDATE member SET token = 0 WHERE
              userId = '$getId'";


$tokenKill = mysql_query($tokenKill);

session_destroy();
?>

<meta http-equiv="refresh" content="0; url=/index.php" />;
