<?php
session_start();
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
$lecName = $_POST['lecName'];
$cateNo = $_POST['cateNo'];
$teacher = $_POST['teacher'];
$lecLevel = $_POST['lecLevel'];
$lecNum = $_POST['lecNum'];
$lecTime = $_POST['lecTime'];
$detail = $_POST['ir1'];

//���ε��� ������ ������ ���丮
$save_dir = "../uploadFiles/";
$relative_dir = "/uploadFiles/";
$real_thumbnail = $relative_dir . $_FILES["thumbnail"]["name"];

    //������ ������ ���丮 �� ���ϸ�
    $thumbnail = $save_dir . $_FILES["thumbnail"]["name"];

    //������ ������ ���丮�� ����
    if(!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbnail))
    {
        die("������ ������ ���丮�� �����ϴµ� �����߽��ϴ�.");
    }


$sql = "INSERT INTO lecture (`lecName`,`cateNo`,`teacher`,`lecLevel`,`lecTime`,`lecNum`,`thumbnail`,`detail`)
        VALUES (
        '".$lecName."',
        '".$cateNo."',
        '".$teacher."',
        '".$lecLevel."',
        '".$lecTime."',
        '".$lecNum."',
        '".$real_thumbnail."',
        '".$detail."')";

$result = mysql_query($sql);
/*$row = mysql_fetch_array($result);*/

if(isset($result)) {

    echo "<script> alert('���ǰ� �ԷµǾ����ϴ�.'); location.href='/view/admin/index.php'</script>";

} else {
    echo "<script> alert('����.'); location.href='/view/admin/index.php'</script>";
}
?>

