<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>

<?php
/*분류 테이블 가져오기*/

$sql= "SELECT * FROM category;";
$data = mysql_query($sql);


/*분류*/
/*print_r($data[0]);
/*강의명*/
/*print_r($data[1]);*/
?>
