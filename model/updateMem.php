<?php
    include_once 'DBconfig.php';
    $sql= "UPDATE member SET userId = '".$_POST['userId']."', userPw = '".$_POST['userPw']."' ,email = '".$_POST['emails']."' , phone = '".$_POST['phones']."', tel = '".$_POST['tels']."', address1 = '".$_POST['address1']."', address2 = '".$_POST['address2']."' , address3 = '".$_POST['address3']."', sendSms = '".$_POST['sendSms']."', sendMail = '".$_POST['sendMail']."' WHERE token = '".$_SESSION['token']."' ";
    $result = mysql_query($sql);
?>
<script>
    alert('수정되었습니다.');
    location.href="/";
</script>