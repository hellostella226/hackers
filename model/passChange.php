<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
$password =$userPw;
$password_hash = hash("sha256", $password);
$userPw = strtoupper($password_hash);

$sql= "UPDATE member
        SET userPw = '".$userPw."'
          where userId = '".$userId."' ";

$resultData = mysql_query($sql);


?>