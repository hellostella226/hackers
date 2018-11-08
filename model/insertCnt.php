<?php
include  $_SERVER['DOCUMENT_ROOT'].'/model/DBconfig.php';



//reviewNo에 해당하는 게시글을 클릭할때마다 카운트가 1회씩 증가한다.

$reviewNo = $_GET['rNo'];

$sql =" UPDATE review SET lecCnt = lecCnt + 1 WHERE
        reviewNo = '".$reviewNo."' ";

$resultCnt = mysql_query($sql);



// 해당 번호의 게시물을 불러온다.

$sql2 = "SELECT * FROM review WHERE
          reviewNo = '".$reviewNo."' ";

$resultRv = mysql_query($sql2);

$resultRv = mysql_fetch_array($resultRv);

print_r($resultRv['lecCnt']);


?>