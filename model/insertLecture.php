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

//업로드한 파일을 저장할 디렉토리
$save_dir = "../uploadFiles/";
$relative_dir = "/uploadFiles/";
$real_thumbnail = $relative_dir . $_FILES["thumbnail"]["name"];

    //파일을 저장할 디렉토리 및 파일명
    $thumbnail = $save_dir . $_FILES["thumbnail"]["name"];

    //파일을 지정한 디렉토리에 저장
    if(!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbnail))
    {
        die("파일을 지정한 디렉토리에 저장하는데 실패했습니다.");
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

    echo "<script> alert('강의가 입력되었습니다.'); location.href='/view/admin/index.php'</script>";

} else {
    echo "<script> alert('오류.'); location.href='/view/admin/index.php'</script>";
}
?>

