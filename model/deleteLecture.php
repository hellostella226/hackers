<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>
<?php
$lecNo = $_GET['lecNo'];
echo $lecNo;

$sql= "DELETE FROM lecture WHERE lecNo = '".$lecNo."' ";

$result = mysql_query($sql);

?>
<script>
    alert('�����Ǿ����ϴ�.');
    location.href="/view/admin/index.php";
</script>