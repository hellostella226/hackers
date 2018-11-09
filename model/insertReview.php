<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
$userNo = $_SESSION['userNo'];
$userName = $_SESSION['userName'];
$title = $_POST['title'];
$content = $_POST['ir1'];
$lecNo = $_POST['lecNo'];
$starChk = $_POST['starChk'];

$sql = "INSERT INTO review (`userNo`,`userName`,`title`,`content`,`lecNo`,`starChk`)
        VALUES (
        '".$userNo."',
        '".$userName."',
        '".$title."',
        '".$content."',
        '".$lecNo."',
        '".$starChk."'
        )";

$result = mysql_query($sql);


    echo "<script> alert('수강후기가 입력되었습니다.'); location.href='/view/review/review_list.php';</script>";

?>

