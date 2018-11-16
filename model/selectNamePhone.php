<?php
include_once  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>

<?php
$userName = iconv("UTF-8", "CP949", rawurldecode(($name)));
$phone = $phone1 . '-' . $phone2 . '-' . $phone3;
//입력받은 이름과 메일로 값을 가져옴
$sql= "
  SELECT userId
    FROM member
      WHERE
        phone = '$phone' and 
        userName = '".$userName."' ";

$result = mysql_query($sql);
$resultSets = mysql_fetch_array($result);
$resultSets['userId'];
?>
