<?php
include 'DBconfig.php';
?>
<?php

$reviewNo = $_GET['reviewNo'];

$sql = "SELECT r.reviewNo, r.userNo, r.userName, r.wDate, r.title, r.content, r.lecNo, r.lecCnt, r.starChk,
        l.lecName, l.`thumbnail`, l.`teacher`, l.`lecLevel`, l.`lecTime`, l.`lecNum`, l.`detail`, m.`userId`, c.cateName, c.cateNo
        FROM review r, lecture l, member m, category c
        WHERE l.lecno = r.`lecNo` AND r.`userNo` = m.`userNo` AND l.`cateNo` = c.`cateNo` AND r.`reviewNo` = '".$reviewNo."' ";

$result = mysql_query($sql);

$row = mysql_fetch_array($result);




$sql2= "SELECT * FROM lecture";

$result2 = mysql_query($sql);


/*$sql2= "SELECT l.lecNo, l.lecName
        FROM lecture l, review r
        WHERE r.lecNo = l.lecNo AND r.reviewNo = '".$reviewNo."' ";*/
?>