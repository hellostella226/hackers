<?php
session_start();
?>
<?php
header("Content-Type: text/html; charset=KS_C_5601-1987");
header("Cache-Control:no-cache");
header("Pragma:no-cache");
include_once './DBconfig.php';
?>

<?php
/* searchType ÀÎÄÚµù*/

$searchType = iconv("UTF-8", "EUC-KR", rawurldecode(($_POST['searchType'])));

$sql = "SELECT c.cateNo, l.lecNo, l.lecName
        FROM lecture l, category c
        WHERE c.`cateNo` = l.`cateNo` AND c.`cateName` = '".$searchType."'";

$data = mysql_query($sql);

while($lec = mysql_fetch_array($data)) {
    print_r("<option id='lecNos' name='lecNos' value='".$lec['lecNo']."'>".$lec['lecName']."</option>");
}
?>
