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

    alert('�����ıⰡ �����Ǿ����ϴ�.');
    location.href ="/view/review/reviewList.html";

</script>
