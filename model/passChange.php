<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
$password = $_POST['userPw'];
$password_hash = hash("sha256", $password);
$userPw = strtoupper($password_hash);


$userId = $_POST['userId'];


$sql= "UPDATE member SET
        userPw = '".$userPw."' where
        token = '".$_SESSION['token']."' ";


$sql = mysql_query($sql);
print_r($sql);

?>

<script>
    location.href="/";
</script>
