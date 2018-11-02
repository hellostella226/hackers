<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>
<?php


$sql= "SELECT * FROM member WHERE token= '".$_SESSION['token']."'";
$sql2= "SELECT * FROM member WHERE userId= '".$_SESSION['userId']."'";
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