<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
$lecNo = $_GET['lecNo'];
echo $lecNo;

$sql= "DELETE FROM lecture WHERE
        lecNo = '".$lecNo."' ";

$result = mysql_query($sql);

?>
<script>
    alert('�����Ǿ����ϴ�.');
    location.href="/view/admin/index.php";
</script>