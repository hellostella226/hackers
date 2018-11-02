<?php
session_start();
include_once 'DBconfig.php';
?>
<?php
$userPw = $_POST['userPw'];
$userId = $_POST['userId'];

$sql= "UPDATE member SET userPw = '$userPw' where token = '".$_SESSION['token']."' ";


$sql = mysql_query($sql);
print_r($sql);
?>
<script>
    location.href="/";
</script>
