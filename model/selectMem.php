<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php


$sql= "SELECT * FROM member.php WHERE
token= '".$_SESSION['token']."'";

$sql2= "SELECT * FROM member.php WHERE
userId= '".$_SESSION['userId']."'";


$result = mysql_query($sql);
$data = mysql_fetch_array($result);

echo $_SESSION['token'];
echo $_SESSION['userId'];

exit;



//    while($row = mysqli_character_set_name($result)){
//        echo $row['userId'];
//
//        mysqli_close($con);
//    }

?>