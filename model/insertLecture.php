<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php

$detail = $ir1;
$myfile = $_FILES['myfile'];



/*설정*/
$uploads_dir = $_SERVER['DOCUMENT_ROOT']."/uploadFiles";
$allowed_ext = array('jpg','jpeg','png','gif');
/*변수 정리*/
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];

$ext = array_pop(explode('.',$name));

/*오류 확인*/

if($error !=UPLOAD_ERR_OK) {

    switch ($error) {

        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "파일이 너무 큽니다. ($error)";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "파일이 첨부되지 않았습니다. ($error)";
            break;
        default:
            echo "파일이 제대로 업로드되지 않았습니다. ($error)";
    }
    exit;
}

// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
    echo "허용되지 않는 확장자입니다.";

} else {

    // 파일 이동
    $thumbnail = move_uploaded_file( $_SERVER['DOCUMENT_ROOT'].$_FILES['myfile']['tmp_name'], "$uploads_dir/$name");
    $real_thumbnail = "/uploadFiles/".$name;

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




