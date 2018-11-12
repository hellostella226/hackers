<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php

$reviewNo = $_GET['reviewNo'];
$userNo = $_SESSION['userNo'];
$userName = $_SESSION['userName'];
$title = $_POST['title'];
$lecNo = $_POST['lecNo'];
$content = $_POST['ir1'];
$lecNo = $_POST['lecNo'];
$starChk = $_POST['starChk'];

$sql = "UPDATE review SET

`userNo` = '".$userNo."',
`userName` = '".$userName."', 
`title` = '".$title."',
`content` = '".$content."',
`lecNo` = '".$lecNo."',
starChk ='".$starChk."'

WHERE reviewNo = '".$reviewNo."' ";

$result = mysql_query($sql);

/*$row = mysql_fetch_array($result);*/

if(isset($result)) {

    echo "<script> alert('강의가 수정되었습니다.'); location.href='/view/review/reviewList.html'</script>";

} else {

    echo "<script> alert('오류.'); location.href='/view/review/reviewList.html'</script>";

}

?>
