<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php

$detail = $ir1;
$myfile = $_FILES['myfile'];



/*����*/
$uploads_dir = $_SERVER['DOCUMENT_ROOT']."/uploadFiles";
$allowed_ext = array('jpg','jpeg','png','gif');
/*���� ����*/
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];

$ext = array_pop(explode('.',$name));

/*���� Ȯ��*/

if($error !=UPLOAD_ERR_OK) {

    switch ($error) {

        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "������ �ʹ� Ů�ϴ�. ($error)";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "������ ÷�ε��� �ʾҽ��ϴ�. ($error)";
            break;
        default:
            echo "������ ����� ���ε���� �ʾҽ��ϴ�. ($error)";
    }
    exit;
}

// Ȯ���� Ȯ��
if( !in_array($ext, $allowed_ext) ) {
    echo "������ �ʴ� Ȯ�����Դϴ�.";

} else {

    // ���� �̵�
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




