<?php
include 'DBconfig.php';
?>
<?php
$reviewNo = $_GET['reviewNo'];

$sql = " DELETE FROM review WHERE
          reviewNo = '".$reviewNo."' ";

$resultD = mysql_query($sql);

?>

<script>

    alert('�����ıⰡ �����Ǿ����ϴ�.');
    location.href ="/view/review/review_list.php";

</script>
