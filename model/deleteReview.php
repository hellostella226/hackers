<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
$reviewNo = $_GET['reviewNo'];

$sql = " DELETE FROM review WHERE
          reviewNo = '".$reviewNo."' ";

$resultD = mysql_query($sql);

?>

<script>

    alert('수강후기가 삭제되었습니다.');
    location.href ="/view/review/reviewList.html";

</script>
