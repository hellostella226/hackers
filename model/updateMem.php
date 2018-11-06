<?php

    include_once 'DBconfig.php';

    $password = $_POST['userPw'];
    $password_hash = hash("sha256", $password);
    /*echo "암호화 전 : ".$password."<br/>";
    echo "암호화 후 : ".$password_hash."<br/>";*/

    $userPw = strtoupper($password_hash);


    $sql= "UPDATE member SET userId = '".$_POST['userId']."', userPw = '".$userPw."' ,email = '".$_POST['emails']."' , phone = '".$_POST['phones']."', tel = '".$_POST['tels']."', address1 = '".$_POST['address1']."', address2 = '".$_POST['address2']."' , address3 = '".$_POST['address3']."', sendSms = '".$_POST['sendSms']."', sendMail = '".$_POST['sendMail']."' WHERE token = '".$_SESSION['token']."' ";
    $result = mysql_query($sql);
?>
<script>
    alert('수정되었습니다.');
    location.href="/";
</script>