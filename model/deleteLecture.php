<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';
?>
<?php
echo $lecNo;

$sql= "DELETE FROM lecture WHERE
        lecNo = '".$lecNo."' ";

$result = mysql_query($sql);

?>