
<?php
session_start();
?>
<?php
include_once 'DBconfig.php';
?>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

<?php
/*print_r($_SESSION['token']);*/

$sql= "SELECT * FROM member WHERE
token= '".$_SESSION['token']."'";


$result = mysql_query($sql);
$data = mysql_fetch_array($result);

/*echo $_SESSION['token'];
echo $_SESSION['userId'];*/


$phone = explode('-',$data[5]);

if($data[6] != "") {
    $tel = explode('-',$data[6]);
};
if($data[4] != "") {
    $email = explode('@', $data[4]);
/*    print_r($email[0]);
    print_r($email[1]);*/
}
?>
<form id="sendMod" method="post">
    <input type="hidden" id="userName" name="userName" value="<?=$data[1]?>">

    <input type="hidden" id="userId" name="userId" value="<?=$data[2]?>">

    <input type="hidden" id="email1" name="email1" value="<?=$email[0]?>">
    <input type="hidden" id="email2" name="email2" value="<?=$email[1]?>">

    <input type="hidden" id="p1" name="p1" value="<?=$phone[0]?>">
    <input type="hidden" id="p2" name="p2" value="<?=$phone[1]?>">
    <input type="hidden" id="p3" name="p3" value="<?=$phone[2]?>">

    <? if($data[6]) { ?>
    <input type="hidden" id="t1" name="t1" value="<?=$tel[0]?>">
    <input type="hidden" id="t2" name="t2" value="<?=$tel[1]?>">
    <input type="hidden" id="t3" name="t3" value="<?=$tel[2]?>">
    <? } ?>

    <input type="hidden" id="address1" name="address1" value="<?=$data[7]?>">
    <input type="hidden" id="address2" name="address2" value="<?=$data[8]?>">
    <input type="hidden" id="address3" name="address3" value="<?=$data[9]?>">
    <input type="hidden" id="sendSms" name="sendSms" value="<?=$data[10]?>">
    <input type="hidden" id="sendMail" name="sendMail" value="<?=$data[11]?>">
</form>
<script>
    $(document).ready(function(){
        $('#sendMod').attr('action','/view/memberController.php/modyfy.php');
        $('#sendMod').submit();
    })
</script>